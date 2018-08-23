<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemService.php
 * @LastModified 8/7/18 4:09 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Services;

use App\Repositories\Contract\PaymentItemContract as PaymentItemRepository;
use App\Services\Contracts\PaymentItemContract;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PaymentItemService implements PaymentItemContract
{

    protected $paymentItemRepository;

    public function __construct(PaymentItemRepository $paymentItemRepository)
    {
        $this->paymentItemRepository = $paymentItemRepository;
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

        return DataTables::eloquent($this->paymentItemRepository->datatableWith($select, $with))
            ->addColumn(
                'action',
                function ($dataDb) {
                    return '<a href="'.route('payment_item.edit', [$dataDb->id]).'" id="tooltip" title="'.trans('global.btn_update').'"><span class="label label-warning label-sm"><i class="fa fa-edit"></i></span></a>
                                <a href="#" data-message="'.trans('global.delete_confirmation', ['name' => $dataDb->name]).'" data-href="'.route('payment_item.destroy', [$dataDb->id]).'" id="tooltip" data-method="DELETE" data-title="'.trans('global.btn_delete')
                        .'" data-toggle="modal" data-target="#delete"><span class="label label-danger label-sm"><i class="fa fa-trash-alt"></i></span></a>';
                }
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
    private function makeList($input, $model)
    {
        foreach ($input as $index => $data) {
            $model->$index = $data;
        }

        return $model;
    }

    /**
     * Store Request To User Table
     *
     * @param $input
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store($input)
    {
        $data = DB::transaction(
            function () use ($input) {
                return $this->paymentItemRepository->save($this->makeList($input, $this->paymentItemRepository->getModel()));
            }
        );

        return $data;
    }

    /**
     * Update Request To User Table
     *
     * @param int   $id
     * @param array $input
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(int $id, array $input)
    {
        $data = DB::transaction(
            function () use ($id, $input) {
                return $this->paymentItemRepository->save($this->makeList($input, $this->paymentItemRepository->get($id)));
            }
        );

        return $data;
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

        return $this->paymentItemRepository->delete($id);
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function get(int $id)
    {
        return $this->paymentItemRepository->get($id);
    }

    /**
     * @param int $userId
     *
     * @return mixed
     */
    public function getUserPaymentItem(int $userId){
        return $this->paymentItemRepository->getManyWhereWithoutScope('user_id', $userId);
    }

}

