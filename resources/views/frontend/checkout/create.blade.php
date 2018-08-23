@extends('frontend.layouts.app')
@section('content')
    <section id="content" class="animated fadeIn @if(Sentinel::guest() == false) mt50 @endif">

        <div class="row">
            <div class="col-md-3 mt20">

            </div>
            <div class="col-md-6 mt20">
                <div class="center-block">
                    <p class="text-center">
                        <img src="{{url('images/new-eoa-logo.png')}}" alt="">
                    </p>

                    @if(request()->token)
                        <div class="alert alert-sm alert-border-left alert-danger alert-dismissable mt30">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info pr10"></i>
                            <strong>Warning: </strong> Your order was cancelled.
                        </div>
                    @endif

                    <div class="panel panel-info" id="p7">
                        <div class="panel-heading">
                            <span class="panel-title"> Your Payment</span>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td colspan="2" class="text-center"><strong>Total</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($paymentItems as $paymentItem)
                                    <tr>
                                        <td>{{$paymentItem->name}}</td>
                                        <td class="text-right">{{$paymentItem->currency}}</td>
                                        <td class="text-right">{{number_format($paymentItem->price)}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Grand Total</strong></td>
                                    <td class="text-right">{{$paymentItem->currency}}</td>
                                    <td class="text-right"><strong>{{number_format($paymentItems->sum('price'))}}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="panel-footer">
                            <div class="pull-right">
                                <a href="{{route('checkout.paypal', ['userToken' => request()->userToken])}}" class="btn btn-success btn-block">Proceed To Paypal</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
@stop

