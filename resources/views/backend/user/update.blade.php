@extends('backend.layout.app')

@section('content')
    <section id="content" class="animated fadeIn">
        @include('component.flash')

        <div class="panel panel-visible">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('auth.form_user_edit_heading')
                </div>
            </div>

            <form action="{{route('user.update', $user->id)}}" method="post">
                <input name="_method" type="hidden" value="PUT">
                <div class="panel-body">
                    {!! csrf_field() !!}

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('first_name')) has-error @endif">
                            <label for="first_name" class="control-label">@lang('auth.form_user_fname_label')
                                <span style="color: red">*</span></label>
                            <input type="text" name="first_name" class="form-control input-sm" placeholder="@lang('auth.form_user_fname_label')" value="{{ old('first_name') ?? $user->first_name }}" tabindex="1">
                            {!! $errors->first('first_name', '<em class="text-danger">:message</em>') !!}
                        </div>

                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            <label for="email" class="control-label">@lang('auth.form_user_email_label')
                                <span style="color: red">*</span></label>
                            <input type="text" name="email" class="form-control input-sm" placeholder="user@risetproduk.com" value="{{ old('email') ?? $user->email }}" tabindex="3" disabled>
                            {!! $errors->first('email', '<em class="text-danger">:message</em>') !!}
                        </div>

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label for="password" class="control-label">@lang('auth.form_user_password_label') </label>
                            <input type="password" name="password" class="form-control input-sm" placeholder="@lang('auth.form_user_password_label')" value="{{old('password')}}" tabindex="5">
                            <span class="help-block margin-top-sm">{{trans('auth.form_user_password_long')}}</span>
                            {!! $errors->first('password', '<em class="text-danger">:message</em>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('last_name')) has-error @endif">
                            <label for="last_name" class="control-label">@lang('auth.form_user_lname_label')</label>
                            <input type="text" name="last_name" class="form-control input-sm" placeholder="@lang('auth.form_user_lname_label')" value="{{ old('last_name') ?? $user->last_name }}" tabindex="2">
                            {!! $errors->first('last_name', '<em class="text-danger">:message</em>') !!}
                        </div>

                        <div class="form-group @if($errors->has('role')) has-error @endif">
                            <label for="role" class="control-label">@lang('auth.form_user_role_label')
                                <span style="color: red">*</span></label>

                            <select name="role" id="role" class="form-control input-sm" data-placeholder="@lang('auth.form_user_role_select')" tabindex="4">

                                <option value="" {{ old('role') ? 'selected="selected"' : ''}}></option>
                                @foreach($roles as $role)
                                    @if (old('role') == $role->id)
                                        <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
                                    @elseif($user->roles->isNotEmpty() && ($user->roles[0]->id == $role->id))
                                        <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>

                                    @else
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('role', '<em class="text-danger">:message</em>') !!}
                        </div>

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label for="password_confirmation" class="control-label">@lang('auth.form_user_password_confirm_label') </label>
                            <input type="password" name="password_confirmation" class="form-control input-sm" placeholder="@lang('auth.form_user_password_confirm_label')" value="{{old('password_confirmation')}}" tabindex="6">
                            <span class="help-block margin-top-sm">@lang('auth.form_user_password_type_again')</span>
                            {!! $errors->first('password', '<em class="text-danger">:message</em>') !!}
                        </div>
                    </div>
                </div>

                @include('component.panel.panel_footer_btn', ['title' => __('auth.form_user_update_btn')])
            </form>
        </div>
    </section>
@endsection

@push('css')
@include('component.select2.css')
@endpush

@push('scripts')
@include('component.select2.js')
@include('component.select2.script', ['id' => ['#role']])
@endpush
