<?php
/**
 * Created By DhanPris
 *
 * @Filename     PaymentItemController.php
 * @LastModified 8/7/18 4:14 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PaymentItemRequest;
use App\Http\Controllers\Controller;
use App\Services\Contracts\PaymentItemContract;
use App\Traits\redirectTo;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class PaymentItemController extends Controller
{
    use redirectTo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.paymentItem.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.paymentItem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaymentItemRequest  $request
     *
     * @param PaymentItemContract $paymentItemContract
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PaymentItemRequest $request, PaymentItemContract $paymentItemContract)
    {

        $request->offsetSet('user_id', Sentinel::getUser()->getUserId());

        #Save File
        $paymentItemContract->store($request->except('_method', '_token', 'previousUrl'));

        #Bump....
        return $this->redirectSuccessCreate(route('payment_item.index'), __('paymentItem.title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PaymentItemContract $paymentItemContract
     * @param  int                $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentItemContract $paymentItemContract, $id)
    {
        return view('backend.paymentItem.update', ['paymentItem' => $paymentItemContract->get($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PaymentItemRequest  $request
     * @param PaymentItemContract $paymentItemContract
     * @param  int                $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PaymentItemRequest $request, PaymentItemContract $paymentItemContract, $id)
    {
        $paymentItemContract->update($id, $request->except('_method', '_token', 'previousUrl'));

        #Bump....
        return $this->redirectSuccessUpdate(route('payment_item.index'), __('paymentItem.title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PaymentItemContract $paymentItemContract
     * @param  int                $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(PaymentItemContract $paymentItemContract, $id)
    {
        $paymentItemContract->delete($id);

        #Bump....
        return $this->redirectSuccessDelete(route('payment_item.index'), __('paymentItem.title'));
    }

    /**
     * @param Request             $request
     * @param PaymentItemContract $paymentItemContract
     */
    public function datatable(Request $request, PaymentItemContract $paymentItemContract)
    {
        if ($request->ajax() == true) {

            $select = [
                'payment_items.id',
                'name',
                'price',
                'currency',
                'payment_items.created_at',
                'payment_items.updated_at',
                'user_id',
            ];

            return $paymentItemContract->datatableWith($select, ['user']);
        }

        return abort('404', 'Upss');
    }
}
