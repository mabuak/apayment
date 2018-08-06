@extends('backend.auth.layout')
@section('content')
    <section id="content" class="animated fadeIn">
        <div class="admin-form theme-info mw500" style="margin-top: 10%;" id="login">
            <div class="row mb15 table-layout">
                <div class="col-xs-6 pln">
                    &nbsp;
                </div>
                <div class="col-xs-6 va-b">
                    <div class="login-links text-right">
                        @include('backend.auth.login_link')
                    </div>
                </div>
            </div>
            <div class="panel panel-info heading-border br-n">
                <form class="form-horizontal" method="POST" action="{{ route('forgot_password.action') }}">
                    {{ csrf_field() }}
                    <div class="panel-body p15 pt25">
                        @include('component.flash')
                        
                        <div class="alert alert-micro alert-border-left alert-info pastel alert-dismissable mn">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-info pr10"></i> {!! __('auth.forgot_password_subheading') !!}
                        </div>
                    </div>
                    
                    <div class="panel-footer p25 pv15">
                        <div class="section mn">
                            <div class="smart-widget sm-right smr-80">
                                <label for="email" class="field prepend-icon">
                                    <input type="text" name="email" id="email" class="gui-input" placeholder="@lang('auth.forgot_password_validation_email_label')">
                                    <label for="email" class="field-icon">
                                        <i class="fa fa-envelope"></i>
                                    </label>
                                </label>
                                <button name="" type="submit" class="button">@lang('auth.forgot_password_submit_btn')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop

