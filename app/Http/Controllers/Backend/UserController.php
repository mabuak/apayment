<?php
/**
 * Created By DhanPris
 *
 * @Filename     UserController.php
 * @LastModified 7/12/18 9:17 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\Contracts\RoleContract;
use App\Services\Contracts\UserContract;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userContract;

    public function __construct(UserContract $userContract)
    {
        $this->userContract = $userContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user.index');
    }

    /**
     * Datatables Ajax Data
     *
     * @param Request $request
     * @return mixed
     * @internal param UserServiceContract $userContract
     */
    public function datatable(Request $request)
    {

        if ($request->ajax() == true) {

            $select = [
                'users.id',
                'first_name',
                'last_name',
                'email',
                'last_login',
                'users.created_at',
                'users.updated_at'
            ];

            return $this->userContract->datatableWith($select, ['roles', 'activations']);
        }

        return abort('404', 'Upss');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param RoleContract $roleContract
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RoleContract $roleContract)
    {
        return view('backend.user.create', array(
            'roles' => $roleContract->getAll()
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @internal param UserServiceContract $userContract
     */
    public function store(UserRequest $request)
    {
        try {

            $this->userContract->store($request);

            session()->flash('success', __('auth.account_creation_successful'));

            return redirect()->route('user.index');

        } catch (QueryException $exception) {

            session()->flash('failed', $exception->getMessage() . ' ' . $exception->getLine());

            return redirect()
                ->back()
                ->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoleContract $roleContract
     * @param  int         $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleContract $roleContract, $id)
    {
        return view('backend.user.update', array(
            'user'  => Sentinel::findUserById($id),
            'roles' => $roleContract->getAll(),
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param  int                      $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        try {

            $this->userContract->update(Sentinel::findById($id), $request);

            session()->flash('success', __('auth.update_successful'));

            return redirect()->route('user.index');

        } catch (QueryException $exception) {

            session()->flash('failed', $exception->getMessage() . ' ' . $exception->getLine());

            return redirect()
                ->back()
                ->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userContract->delete($id);

        session()->flash('success', __('auth.delete_successful'));

        return redirect()->back();
    }


    /**
     * Active or Deactive User
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($id)
    {

        $user = Sentinel::findById($id);

        $activation = Activation::completed($user);

        if ($activation !== false) {
            #Deactivated This Activation
            if ($user->id === Sentinel::getUser()->id) {
                session()->flash('failed', __('auth.deactivate_unsuccessful'));

                return redirect()->back();
            }

            #Remove user activation
            Activation::remove($user);

            session()->flash('success', __('auth.deactivate_successful'));
            return redirect()->back();
        }

        #Cannot deactivate current user
        if ($user->id === Sentinel::getUser()->id) {
            session()->flash('failed', __('auth.active_current_user_unsuccessful'));
            return redirect()->back();
        }

        #Get Activation Code
        $activationCreate = Activation::create($user);

        #Activate the account
        Activation::complete($user, $activationCreate->code);

        session()->flash('success', __('auth.activate_successful'));
        return redirect()->back();
    }
}
