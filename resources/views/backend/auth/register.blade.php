@extends('backend.auth.layout')
@section('content')
    <section id="content">

        <div class="admin-form theme-info mw700" id="login1">
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
                <form method="post" action="{{route('action.register')}}" id="register">
                    {{csrf_field()}}
                    <div class="panel-body p25 bg-light">

                        @include('component.flash')

                        <div class="section-divider mt10 mb40">
                            <span>@lang('auth.account_creation_information')</span>
                        </div>

                        <div class="section row">
                            <div class="col-md-6">
                                <label for="first_name" class="field prepend-icon {{ $errors->has('first_name') ? 'state-error' : '' }}">
                                    <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="gui-input" placeholder="@lang('auth.index_fname_th')...*">
                                    <label for="first_name" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                                {!! $errors->first('first_name', '<em for="first_name" class="state-error">:message</em>') !!}

                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="field prepend-icon {{ $errors->has('last_name') ? 'state-error' : '' }}">
                                    <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="gui-input" placeholder="@lang('auth.index_lname_th')...*">
                                    <label for="last_name" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                                {!! $errors->first('last_name', '<em for="last_name" class="state-error">:message</em>') !!}
                            </div>
                        </div>

                        <div class="section-divider mt10 mb40">
                            <span>@lang('auth.account_creation_login_information')</span>
                        </div>

                        <div class="section">
                            <label for="email" class="field prepend-icon {{ $errors->has('email') ? 'state-error' : '' }}">
                                <input type="email" name="email" id="email" value="{{old('email')}}" class="gui-input" placeholder="@lang('auth.form_user_validation_email_label')...*">
                                <label for="email" class="field-icon">
                                    <i class="fa fa-envelope"></i>
                                </label>
                            </label>
                            {!! $errors->first('email', '<em for="email" class="state-error">:message</em>') !!}
                        </div>

                        <div class="section">
                            <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                                <input type="password" name="password" id="password" value="{{old('password')}}" class="gui-input" placeholder="@lang('auth.form_user_validation_password_label')">
                                <label for="password" class="field-icon">
                                    <i class="fa fa-unlock-alt"></i>
                                </label>
                            </label>
                            {!! $errors->first('password', '<em for="password" class="state-error">:message</em>') !!}

                        </div>

                        <div class="section">
                            <label for="password_confirmation" class="field prepend-icon {{ $errors->has('password_confirmation') ? 'state-error' : '' }}">
                                <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" class="gui-input" placeholder="@lang('auth.form_user_validation_password_confirm_label')">
                                <label for="password_confirmation" class="field-icon">
                                    <i class="fa fa-lock"></i>
                                </label>
                            </label>

                            {!! $errors->first('password_confirmation', '<em for="password_confirmation" class="state-error">:message</em>') !!}

                        </div>
                    </div>

                    <div class="panel-footer clearfix">
                        <button type="submit" class="button btn-primary pull-right">@lang('auth.account_creation_register')</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@stop
