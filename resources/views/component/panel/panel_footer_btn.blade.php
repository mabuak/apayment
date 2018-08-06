<div class="panel-footer">
    <input type="hidden" value="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" name="previousUrl">
    <a href="{{old('previousUrl') ? old('previousUrl') : url()->previous()}}" class="btn btn-flat btn-default btn-sm"><i class="fa fa-reply"></i> @lang('auth.form_user_cancel_btn')
    </a>

    <div class="pull-right">
        <button type="submit" class="btn ladda-button btn-success btn-sm" data-style="zoom-in">
            <span class="ladda-label"><i class="fa fa-save"></i> {{$title}}</span>
            <span class="ladda-spinner"><div class="ladda-progress" style="width: 0px;"></div></span>
        </button>
    </div>

    <div class="clearfix"></div>
</div>