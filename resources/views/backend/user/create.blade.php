@extends('backend.layout.app')

@section('content')
    <section id="content" class="animated fadeIn">
        @include('component.flash')

        <div class="panel panel-visible">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('auth.form_user_submit_btn')
                </div>
            </div>

            <form action="{{route('user.store')}}" method="post">
                <div class="panel-body">
                    {!! csrf_field() !!}

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('first_name')) has-error @endif">
                            <label for="name" class="control-label">@lang('auth.index_fname_th')
                                <span style="color: red">*</span></label>
                            <input type="text" name="first_name" class="form-control input-sm" placeholder="@lang('auth.index_fname_th')" value="{{ old('first_name') }}" tabindex="1">
                            {!! $errors->first('first_name', '<em class="text-danger">:message</em>') !!}
                        </div>

                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            <label for="email" class="control-label">@lang('auth.form_user_email_label')
                                <span style="color: red">*</span></label>
                            <input type="text" name="email" class="form-control input-sm" placeholder="user@tokoyo.com" value="{{ old('email') }}" tabindex="3">
                            {!! $errors->first('email', '<em class="text-danger">:message</em>') !!}
                        </div>

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label for="password" class="control-label">@lang('auth.form_user_password_label')
                                <span style="color: red">*</span></label>
                            <input type="password" name="password" class="form-control input-sm" placeholder="@lang('auth.form_user_password_label')" value="{{old('password')}}" tabindex="5">
                            <span class="help-block margin-top-sm">{{trans('auth.form_user_password_long')}}</span>
                            {!! $errors->first('password', '<em class="text-danger">:message</em>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if($errors->has('last_name')) has-error @endif">
                            <label for="name" class="control-label">@lang('auth.index_lname_th')
                                <span style="color: red">*</span></label>
                            <input type="text" name="last_name" class="form-control input-sm" placeholder="@lang('auth.index_lname_th')" value="{{ old('last_name') }}" tabindex="1">
                            {!! $errors->first('last_name', '<em class="text-danger">:message</em>') !!}
                        </div>

                        <div class="form-group @if($errors->has('role')) has-error @endif">
                            <label for="role" class="control-label">@lang('auth.form_user_role_label')
                                <span style="color: red">*</span></label>

                            <select name="role" class="form-control input-sm" data-placeholder="@lang('auth.form_user_role_select')" tabindex="4">

                                <option value="" {{ old('role') ? 'selected="selected"' : ''}}></option>
                                @foreach($roles as $role)
                                    @if (old('role') == $role->id)
                                        <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
                                    @else
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('role', '<em class="text-danger">:message</em>') !!}

                        </div>

                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label for="password_confirmation" class="control-label">@lang('auth.form_user_password_confirm_label')
                                <span style="color: red">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control input-sm" placeholder="@lang('auth.form_user_password_confirm_label')" value="{{old('password_confirmation')}}" tabindex="6">
                            <span class="help-block margin-top-sm">@lang('auth.form_user_password_type_again')</span>
                            {!! $errors->first('password', '<em class="text-danger">:message</em>') !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="hidden" value="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" name="previousUrl">
                    <a href="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" class="btn btn-flat btn-default btn-sm"><i class="fa fa-reply"></i> @lang('auth.form_user_cancel_btn')</a>

                    <div class="pull-right">
                        <button type="submit" class="btn ladda-button btn-success btn-sm" data-style="zoom-in">
                            <span class="ladda-label"><i class="fa fa-save"></i> @lang('auth.form_user_submit_btn')</span>
                            <span class="ladda-spinner"><div class="ladda-progress" style="width: 0px;"></div></span>
                        </button>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('css')
<!-- Select 2 -->
<link rel="stylesheet" href="{{url('plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{url('plugins/select2/css/select2-bootstrap.css')}}">
@endpush

@push('scripts')
<script src="{{url('plugins/select2/js/select2.full.js')}}"></script>

<script type="text/javascript">

    $(function () {
        $('form select').select2({
            theme: "bootstrap",
            placeholder: "Select",
            containerCssClass: ':all:',
        });
    });
</script>
@endpush
