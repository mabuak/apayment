@extends('backend.layout.app')
@section('content')
    <section id="content" class="animated fadeIn">
        @include('component.flash')

        <div class="row mb10">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <blockquote class="blockquote-danger">
                            <p>Please make sure to add your payment items before give this checkout url to your customers <br></p>
                        </blockquote>

                        Your Checkout Url :<br>

                        <h4>
                            <a target="_blank" href="{{route('checkout.create', ['userToken' => Sentinel::getUser()->token])}}">
                                {{route('checkout.create', ['userToken' => Sentinel::getUser()->token])}}
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop