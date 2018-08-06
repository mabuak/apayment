@extends('backend.layout.app')
@section('content')
    <section id="content" class="animated fadeIn">
        @include('component.flash')

        <div class="panel panel-visible">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('auth.change_password_heading')
                </div>
            </div>

            <form method="POST" action="{{ route('change_password.action') }}">
                <div class="panel-body">
                    {{ csrf_field() }}

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('old_password')) has-error @endif">
                            <label for="old_password" class="control-label">@lang('auth.change_password_old_password_label') <span style="color: red">*</span></label>
                            <input type="password" name="old_password" id="old_password" value="{{old('old_password')}}" class="form-control input-sm" placeholder="@lang('auth.change_password_old_password_label')">
                            {!! $errors->first('old_password', '<p class="text-danger">:message</p>') !!}
                        </div>

                        <hr class="short alt">

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label for="password" class="control-label">@lang('auth.change_password_new_password_label') <span style="color: red">*</span></label>
                            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control input-sm" placeholder="@lang('auth.change_password_new_password_label')">
                            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                        </div>

                        <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                            <label for="password_confirmation" class="control-label">@lang('auth.change_password_new_password_confirm_label') <span style="color: red">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" class="form-control input-sm" placeholder="@lang('auth.change_password_new_password_confirm_label')">
                            {!! $errors->first('password_confirmation', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="alert alert-sm alert-border-left alert-danger alert-dismissable">
                            <i class="fa fa-info pr10"></i>
                            @lang('global.alert_warning')
                            <ul>
                                <li>@lang('auth.change_password_information_1')</li>
                                <li>@lang('auth.change_password_information_2')</li>
                                <li>@lang('auth.change_password_information_3')</li>
                                <li>@lang('auth.change_password_information_4')</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <input type="hidden" value="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" name="previousUrl">
                    <a href="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" class="btn btn-flat btn-default btn-sm"><i class="fa fa-reply"></i> @lang('auth.form_user_cancel_btn')</a>

                    <div class="pull-right">
                        <button type="submit" class="btn ladda-button btn-success btn-sm" data-style="zoom-in">
                            <span class="ladda-label"><i class="fa fa-save"></i> @lang('auth.change_password_submit_btn')</span>
                            <span class="ladda-spinner"><div class="ladda-progress" style="width: 0px;"></div></span></button>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
@stop

