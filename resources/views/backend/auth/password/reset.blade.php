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
                <form class="form-horizontal" method="POST" action="{{ route('reset_password.action', [request('userId'), request('code')]) }}">
                    {{ csrf_field() }}
                    <div class="panel-body p25 bg-light">
                        
                        @include('component.flash')
                        
                        <div class="section">
                            <label for="password" class="field prepend-icon {{ $errors->has('password') ? 'state-error' : '' }}">
                                <input type="password" name="password" id="password" value="{{old('password')}}" class="gui-input" placeholder="@lang('auth.change_password_new_password_label')">
                                <label for="password" class="field-icon">
                                    <i class="fa fa-unlock-alt"></i>
                                </label>
                            </label>
                            {!! $errors->first('password', '<em for="password" class="state-error">:message</em>') !!}
                        </div>
                        
                        <div class="section">
                            <label for="password_confirmation" class="field prepend-icon {{ $errors->has('password_confirmation') ? 'state-error' : '' }}">
                                <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" class="gui-input" placeholder="@lang('auth.change_password_new_password_confirm_label')">
                                <label for="password_confirmation" class="field-icon">
                                    <i class="fa fa-lock"></i>
                                </label>
                            </label>
                            
                            {!! $errors->first('password_confirmation', '<em for="password_confirmation" class="state-error">:message</em>') !!}
                        </div>
                    </div>
                    
                    <div class="panel-footer clearfix p10 ph15">
                        <button type="submit" class="button btn-primary mr10 btn pull-right">@lang('auth.reset_password_submit_btn')</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop