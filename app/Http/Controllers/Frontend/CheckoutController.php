<?php
/**
 * Created By DhanPris
 *
 * @Filename     CheckoutController.php
 * @LastModified 8/9/18 10:19 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Contracts\InvoiceContract;
use App\Services\Contracts\PaymentItemContract;
use App\Services\Contracts\PaypalContract;
use App\Services\Contracts\UserContract;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $invoiceContract;

    public function __construct(InvoiceContract $invoiceContract)
    {
        $this->invoiceContract = $invoiceContract;
    }

    /**
     * Checkout page
     *
     * http://apayment.loc/checkout?userToken=65f7f3c9339efd862843a47378ba9940
     *
     * @param Request             $request
     * @param UserContract        $userContract
     *
     * @param PaymentItemContract $paymentItemContract
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function create(Request $request, UserContract $userContract, PaymentItemContract $paymentItemContract)
    {
        if ($request->userToken == null) {
            abort('404');
        }

        $user = $userContract->getOneByToken($request->userToken);

        if($user == null){
            abort('404');
        }

        #Get Payment Item
        $paymentItems = $paymentItemContract->getUserPaymentItem($user->id);

        return view('frontend.checkout.create', ['paymentItems' => $paymentItems]);
    }

    public function store(Request $request){
        dd($request->all());
    }

    /**
     * Checkout With Paypal.
     *
     * http://apayment.loc/checkout/paypal?userToken=65f7f3c9339efd862843a47378ba9940
     *
     * @param Request             $request
     * @param UserContract        $userContract
     * @param PaymentItemContract $paymentItemContract
     *
     * @param PaypalContract      $paypalContract
     *
     * @return void
     */
    public function paypal(Request $request, UserContract $userContract, PaymentItemContract $paymentItemContract, PaypalContract $paypalContract)
    {

        if ($request->userToken == null) {
            abort('404');
        }

        $user = $userContract->getOneByToken($request->userToken);

        #Get Payment Item
        $paymentItems = $paymentItemContract->getUserPaymentItem($user->id);

        #Prepare Checkout Data
        $checkoutData = $paypalContract->makeCheckoutData($paymentItems, route('checkout.paypal.success'), route('checkout.create', ['userToken' => $request->userToken]), null);

        $response = $paypalContract->setExpressCheckout($checkoutData);

        #Save Invoice Data
        $this->invoiceContract->store($checkoutData, $user->id, 'paypal', $response['TOKEN'], $user->id);

        return redirect($response['paypal_link']);
    }

    /**
     * Do The Payment And Send To Thankyou Page
     *
     * @param Request        $request
     * @param PaypalContract $paypalContract
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paypalThankyou(Request $request, PaypalContract $paypalContract)
    {
        $invoice = $this->invoiceContract->getOneByPaypalToken($request->token);

        #Prepare Checkout Data
        $checkoutData = $paypalContract->makeCheckoutData($invoice->invoiceItems, route('checkout.paypal.success'), route('checkout.create', ['token' => $request->token]), $invoice->invoice_no);

        #Do Payment
        $response = $paypalContract->doExpressCheckoutPayment($checkoutData, $request->token, $request->PayerID);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $this->invoiceContract->update($invoice->id, ['status' => 'Paid']);

            return view('frontend.checkout.thankyou');
        }

        abort(404);
    }
}
