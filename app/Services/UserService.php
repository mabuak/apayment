<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserService.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services;

use App\Repositories\Contract\UserContract as UserRepositoryContract;
use App\Services\Contracts\UserContract;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserService implements UserContract
{

    protected $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    /**
     * Show Datatables
     *
     * @param       $select
     * @param array $with
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatableWith($select, array $with)
    {

        return Datatables::eloquent($this->userRepositoryContract->datatableWith($select, $with))
            ->addColumn(
                'action',
                function ($dataDb) {
                    if (Sentinel::getUser()->getUserId() == $dataDb->id) {
                        return '<a href="'.route('user.edit', [$dataDb->id]).'" id="tooltip" title="'.trans('global.btn_update').'"><span class="label label-warning label-sm"><i class="fa fa-edit"></i></span></a>';
                    }

                    return '<a href="'.route('user.edit', [$dataDb->id]).'" id="tooltip" title="'.trans('global.btn_update').'"><span class="label label-warning label-sm"><i class="fa fa-edit"></i></span></a>
                                <a href="#" data-message="'.trans('auth.delete_confirmation', ['name' => $dataDb->first_name]).'" data-href="'.route('user.destroy', [$dataDb->id]).'" id="tooltip" data-method="DELETE" data-title="'.trans('global.btn_delete')
                        .'" data-toggle="modal" data-target="#delete"><span class="label label-danger label-sm"><i class="fa fa-trash-alt"></i></span></a>';
                }
            )
            ->addColumn(
                'role',
                function ($dataDb) {
                    if ($dataDb->roles->isNotEmpty()) {
                        return implode(
                            ', ',
                            collect($dataDb->roles)
                                ->pluck('name')
                                ->all()
                        );
                    }
                }
            )
            ->addColumn(
                'status',
                function ($dataDb) {
                    if ($dataDb->activations->isNotEmpty()) {
                        if ($dataDb->activations[0]->completed == 1) {
                            return '<a href="#" data-message="'.trans('auth.deactivate_subheading', ['name' => $dataDb->first_name]).'" data-href="'.route('user.status', $dataDb->id).'" id="tooltip" data-method="PUT" data-title="'.trans('auth.deactivate_this_user').'" data-title-modal="'.trans(
                                    'auth.deactivate_heading'
                                ).'" data-toggle="modal" data-target="#delete" title="'.trans('auth.deactivate_this_user').'"><span class="label label-success label-sm">'.trans('auth.index_active_link').'</span></a>';
                        }
                    }

                    return '<a href="#" data-message="'.trans('auth.activate_subheading', ['name' => $dataDb->first_name]).'" data-href="'.route('user.status', $dataDb->id).'" id="tooltip" data-method="PUT" data-title="'.trans('auth.activate_this_user').'" data-title-modal="'.trans('auth.deactivate_heading')
                        .'" data-toggle="modal" data-target="#delete" title="'.trans('auth.activate_this_user').'"><span class="label label-danger label-sm">'.trans('auth.index_inactive_link').'</span></a>';

                }
            )
            ->rawColumns(
                array(
                    'status',
                    'action',
                )
            )
            ->make(true);
    }

    /**
     * Prepare Data
     *
     * @param $request
     *
     * @return array
     */
    private function makeList($request)
    {
        return $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => strtolower($request->email),
            'password'   => $request->password,
            'token'      => md5(now()),
        ];
    }

    /**
     * Store Request To User Table
     *
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store($request)
    {
        $user = DB::transaction(
            function () use ($request) {

                //Create a new user and activated
                $user = Sentinel::registerAndActivate($this->makeList($request));

                //Attach the user to the role
                $role = Sentinel::findRoleById($request->role);
                $role->users()
                    ->attach($user);

                return $user;
            }
        );

        return $user;
    }

    /**
     * Update Request To User Table
     *
     * @param $user
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update($user, $request)
    {

        $user = DB::transaction(
            function () use ($user, $request) {

                #Get The Old Role
                $oldRole = Sentinel::findRoleById($user->roles[0]->id ?? null);

                #Prepare Data
                $data = array_except($this->makeList($request), ['email', 'password', 'token']);

                #If User Input Password
                if ($request->password) {
                    $data['password'] = $request->password;
                }

                #Get The New Role
                $role = Sentinel::findRoleById($request->role);

                #Remove Old Role When User Set The Role Before
                if ($oldRole) {
                    $oldRole->users()
                        ->detach($user);
                }

                #Assign new role to user.
                $role->users()
                    ->attach($user);

                #Update User
                return Sentinel::update($user, $data);
            }
        );

        return $user;
    }

    /**
     * Delete User From Table
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {

        #Cannot Delete Own User
        if (Sentinel::getUser()->getUserId() == $id) {
            return false;
        }

        return $this->userRepositoryContract->delete($id);
    }

    /**
     * Get User By Token
     *
     * @param $token
     *
     * @return mixed
     */
    public function getOneByToken($token){
        return $this->userRepositoryContract->getOneWhere('token',  $token);
    }
}

