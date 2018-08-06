@extends('backend.auth.layout')
@section('content')
    <section id="content">

        <div class="admin-form theme-info" id="login1">
            <div class="row mb15 table-layout">
                <div class="col-xs-6 va-m pln">
                    &nbsp;
                </div>
                <div class="col-xs-6 text-right va-b pr5">
                    <div class="login-links">
                        @include('backend.auth.login_link')
                    </div>
                </div>
            </div>
            <div class="panel panel-info mt10 br-n">
                <div class="panel-heading heading-border bg-white"></div>

                <form role="form" method="POST" id="login" action="{{ route('action.login') }}">
                    {{csrf_field()}}
                    <div class="panel-body bg-light p30">

                        @include('component.flash')

                        <div class="row">
                            <div class="col-sm-12 pr30">

                                <div class="section">
                                    <label for="email" class="field-label text-muted fs18 mb10">@lang('auth.login_identity_label')</label>
                                    <label for="email" class="field prepend-icon {{ $errors->has('email') ? 'state-error' : '' }}">
                                        <input type="text" name="email" id="email" class="gui-input" placeholder="@lang('auth.login_identity_placeholder')">
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                    {!! $errors->first('email', '<em for="username" class="state-error">:message</em>') !!}
                                </div>
                                <!-- end section -->

                                <div class="section">
                                    <label for="password" class="field-label text-muted fs18 mb10">@lang('auth.login_password_label')</label>
                                    <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                                        <input type="password" name="password" id="password" class="gui-input" placeholder="@lang('auth.login_password_placeholder')" aria-invalid="true">
                                        <label for="password" class="field-icon">
                                            <i class="fa fa-lock"></i>
                                        </label>
                                    </label>

                                    {!! $errors->first('password', '<em for="password" class="state-error">:message</em>') !!}
                                </div>
                                <!-- end section -->

                                <div class="section">
                                    <a href="{{route('forgot_password.form')}}" class="active" title="Sign In">@lang('auth.login_forgot_password')</a>
                                </div>
                                <!-- end section -->
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer clearfix p10 ph15">
                        <button type="submit" class="button btn-primary mr10 pull-right">@lang('auth.login_sign_in')</button>
                        <label class="switch ib switch-primary pull-left input-align mt10">
                            <input type="checkbox" name="remember" id="remember" checked>
                            <label for="remember" data-on="@lang('auth.login_yes_label')" data-off="@lang('auth.login_no_label')"></label>
                            <span>@lang('auth.login_remember_label')</span>
                        </label>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop
