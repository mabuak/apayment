@extends('backend.layout.app')

@section('content')
    <section id="content" class="animated fadeIn">
        @include('component.flash')

        <div class="panel panel-visible">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('paymentItem.create')
                </div>
            </div>

            <form action="{{route('payment_item.store')}}" method="post">
                <div class="panel-body">
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-md-12">
                            @include('component.form.input', ['label' => trans('paymentItem.form_name'),  'name' => 'name','value' => old('name', ''), 'required' => true])
                        </div>

                        <div class="col-md-4">

                            <div class="form-group @if($errors->has('price')) has-error @endif">

                                <label for="price" class="control-label">@lang('paymentItem.form_price') <span style="color: red">*</span></label>

                                <input type="text" class="form-control input-sm price text-right" id="price" name="price" value="{{str_replace(',', '', old('price'))}}">

                                {!! $errors->first('price', '<em for="price" class="text-danger">:message</em>') !!}
                            </div>
                        </div>

                        <div class="col-md-1">
                            @include('component.form.input', ['label' => trans('paymentItem.form_currency'),  'name' => 'currency','value' => old('currency', 'HKD'), 'required' => false, 'readonly' => true])
                        </div>
                    </div>
                </div>

                @include('component.panel.panel_footer_btn', ['title' => trans('global.submit')])
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{url('plugins/autonumeric/autoNumeric.js')}}"></script>
    <script>
        function loadCurrency() {
            $("#price").autoNumeric('init', {aPad: false, aSep: ','});
        }

        $(document).ready(function () {
            loadCurrency();
        })
    </script>
@endpush
