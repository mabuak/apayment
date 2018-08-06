<?php
/**
 * Created By DhanPris
 *
 * @Filename     RoleController.php
 * @LastModified 6/9/18 11:38 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Services\Contracts\RoleContract;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleContract;

    public function __construct(RoleContract $roleContract)
    {
        $this->roleContract = $roleContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.role.index');
    }

    /**
     * Datatables Ajax Data
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function datatable(Request $request)
    {

        if ($request->ajax()) {

            $select = [
                'id',
                'slug',
                'name',
                'created_at',
                'updated_at',
            ];

            return $this->roleContract->datatable($select);
        }

        return abort('404', 'Upss');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->roleContract->store($request);

        session()->flash('success', __('auth.role_creation_successful'));

        return redirect()->route('role.index');
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
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(
            'backend.role.update',
            array(
                'role' => $this->roleContract->get($id),
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param  int        $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {

        $this->roleContract->update($id, $request);

        session()->flash('success', __('auth.role_update_successful'));

        return redirect()->route('role.index');
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
        $this->roleContract->delete($id);

        session()->flash('success', __('auth.delete_successful'));

        return redirect()->route('role.index');
    }

    /**
     * Show the form for copying the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function copy($id)
    {
        return view(
            'backend.role.copy',
            array(
                'role' => $this->roleContract->get($id),
            )
        );
    }
}
