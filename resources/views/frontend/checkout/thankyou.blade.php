@extends('frontend.layouts.app')
@section('content')
    <section id="content" class="animated fadeIn">

        <div class="row">
            <div class="col-sm-2">&nbsp;</div>
            <div class="col-sm-8">
                <div class="center-block">
                    <p class="text-center mt40">
                        <img src="{{Storage::url('uploads/images/EOA-Logo-200x50.png')}}" alt="">
                    </p>

                    <div class="panel panel-info mt40" style="margin-bottom: 80px" id="p7">
                        <div class="panel-body">
                            <h2>Thanks For Your Payment</h2>

                            <hr class="short alt">
                            <p>
                                You just completed your payment. </p>
                            <p>
                                This transaction will appear on your statement as Paypal </p>

                            <hr class="short alt">

                            <p>
                                If you have problems with your order or have any questions or comments, please refer to your Agent for assistance </p>

                            <hr class="short alt">

                            <h4>
                                Thank you again for your payment! </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">&nbsp;</div>

            <div class="clearfix"></div>
        </div>
    </section>
@stop