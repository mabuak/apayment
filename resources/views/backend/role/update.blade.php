@extends('backend.layout.app')

@section('content')
    <section id="content" class="animated fadeIn">
        @include('component.flash')

        <div class="panel panel-visible">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('auth.form_role_edit_title')
                </div>
            </div>

            <form action="{{route('role.update', $role->id)}}" method="post">
                <input name="_method" type="hidden" value="PUT">
                <div class="panel-body">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="name">@lang('auth.form_role_name_label') <span style="color: red">*</span></label>
                        <input type="text" name="name" class="form-control input-sm" placeholder="@lang('auth.form_role_name_label')" value="{{ old('name') ?? $role->name }}">
                        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                    </div>

                    <hr class="short alt">

                    @include('backend.role.table')
                </div>

                <div class="panel-footer">
                    <input type="hidden" value="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" name="previousUrl">
                    <a href="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" class="btn btn-flat btn-default btn-sm"><i class="fa fa-reply"></i> @lang('auth.form_user_cancel_btn')
                    </a>

                    <div class="pull-right">
                        <button type="submit" class="btn ladda-button btn-success btn-sm" data-style="zoom-in">
                            <span class="ladda-label"><i class="fa fa-save"></i> @lang('auth.form_role_edit_submit_btn')</span>
                            <span class="ladda-spinner"><div class="ladda-progress" style="width: 0px;"></div></span>
                        </button>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
@stop
