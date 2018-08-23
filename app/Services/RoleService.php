<?php
/**
 * Created By DhanPris
 *
 * @Filename     RoleService.php
 * @LastModified 8/6/18 4:53 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services;

use App\Repositories\Contract\RoleContract as RoleRepositoryContract;
use App\Services\Contracts\RoleContract;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RoleService implements RoleContract
{

    protected $roleRepositoryContract;

    public function __construct(RoleRepositoryContract $roleRepositoryContract)
    {
        $this->roleRepositoryContract = $roleRepositoryContract;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->roleRepositoryContract->getAll();
    }

    /**
     * @param $select
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @internal param $with
     */
    public function datatable($select)
    {
        return DataTables::eloquent(
            $this->roleRepositoryContract->datatable($select)
        )
            ->addColumn(
                'action',
                function ($dataDb) {
                    if ($dataDb->slug == 'root') {
                        return '<a href="'.route('role.edit', $dataDb->id)
                            .'" id="tooltip" title="'.__('global.btn_update').'"><span class="label label-warning label-sm"><i class="fa fa-edit"></i></span></a>
                             <a href="'.route('role.copy', $dataDb->id)
                            .'" id="tooltip" title="'.trans('global.copy')
                            .'"><span class="label label-info label-sm"><i class="fa fa-copy"></i></span></a>';

                    }

                    return '<a href="'.route('role.edit', $dataDb->id)
                        .'" id="tooltip" title="'.__('global.btn_update').'"><span class="label label-warning label-sm"><i class="fa fa-edit"></i></span></a>
                             <a href="'.route('role.copy', $dataDb->id)
                        .'" id="tooltip" title="'.trans('global.copy').'"><span class="label label-info label-sm"><i class="fa fa-copy"></i></span></a>
                             <a href="#" data-message="'.trans(
                            'auth.delete_confirmation',
                            ['name' => $dataDb->name]
                        ).'" data-href="'.route('role.destroy', $dataDb->id)
                        .'" id="tooltip" data-method="DELETE" data-title="'
                        .trans('global.btn_delete').'" data-title-modal="'
                        .trans('auth.delete_confirmation_heading')
                        .'" data-toggle="modal" data-target="#delete"><span class="label label-danger label-sm"><i class="fa fa-trash-alt"></i></span></a>';
                }
            )
            ->make(true);
    }

    /**
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store($request)
    {
        $permissions = DB::transaction(
            function () use ($request) {
                return $this->roleRepositoryContract->create(
                    [
                        'name'        => $request->name,
                        'slug'        => str_slug($request->name),
                        'permissions' => $this->permissions($request),
                    ]
                );
            }
        );

        return $permissions;
    }

    /**
     * @param $id
     * @param $request
     *
     * @return mixed
     * @internal param $user
     * @throws \Throwable
     */
    public function update($id, $request)
    {
        $permissions = DB::transaction(
            function () use ($id, $request) {
                return $this->roleRepositoryContract->update(
                    $id,
                    [
                        'name'        => $request->name,
                        'slug'        => str_slug($request->name),
                        'permissions' => json_encode(
                            $this->permissions($request)
                        ),
                    ]
                );
            }
        );

        return $permissions;
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $role = Sentinel::findRoleById($id);

        if ($role->slug != 'root') {
            return Sentinel::findRoleById($id)->delete();
        }

        return false;
    }

    /**
     * For Add Permission
     *
     * @param $request
     *
     * @return string
     */
    private function permissions($request)
    {
        $permissions['dashboard'] = true;

        $request = $request->except(
            array('_token', 'name', '_method', 'previousUrl')
        );

        foreach ($request as $key => $value) {
            $permissions[preg_replace('/_([^_]*)$/', '.\1', $key)] = true;
        }

        return $permissions;
    }

    /**
     * Get Data By ID
     *
     * @param $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->roleRepositoryContract->get($id);
    }
}

