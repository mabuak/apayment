@extends('backend.layout.app')

@section('content')

    <section id="content" class="animated fadeIn">
        @include('component.flash')

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('paymentItem.list')
                </div>
            </div>

            <div class="panel-menu">
                <a href="{{route('payment_item.create')}}" class="btn btn-flat btn-success btn-sm">@lang('global.btn_add_new')</a>
            </div>
            <table class="table table-striped table-bordered table-hover table-condensed" id="datatable" width="100%"></table>
        </div>
    </section>
@stop

@push('css')
    @include('component.datatables.css')
@endpush

@push('scripts')

    @include('component.datatables.js')
    <script>
        var table = $('#datatable').DataTable({
            aaSorting: [[0, 'desc']],
            iDisplayLength: 10,
            responsive: true,
            fixedHeader: true,
            processing: true,
            serverSide: true,
            dom: "<'dt-panelmenu clearfix'<'row'<'col-sm-2'B><'col-sm-4'l><'col-sm-6'f>>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'dt-panelfooter clearfix'<'row'<'col-sm-5'i><'col-sm-7'p>>>",
            language: {url: '{{ Session::get('locale') ? url('plugins/datatables/language/'. Session::get('locale') .'.json') : url('plugins/datatables/language/en.json')}}'},
            pagingType: "full_numbers",
            ajax: {
                url: '{!! route('payment_item.ajax.datatable') !!}',
                dataType: 'json'
            },
            columns: [
                {data: 'id', name: 'id', visible: false},
                {data: 'name', name: 'name', title: '@lang('paymentItem.form_name')'},
                {data: 'price', name: 'price', title: '@lang('paymentItem.form_price')', class: 'text-right'},
                {data: 'currency', name: 'currency', title: '@lang('paymentItem.form_currency')'},
                {data: 'user.email', name: 'user.email', defaultContent: '', title: '@lang('paymentItem.form_agent')'},
                {data: 'created_at', name: 'created_at', title: '@lang('auth.index_created_at')', visible: false},
                {data: 'updated_at', name: 'updated_at', title: '@lang('auth.index_updated_at')', visible: false},
                {
                    data: 'action', name: 'action', title: '@lang('auth.index_action_th')', orderable: false, searchable: false,
                    fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                        //  console.log( nTd );
                        $("a", nTd).tooltip({container: 'body'});
                    }
                }
            ],
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i> @lang('auth.index_column')',
                    columns: '1, 2, 3, 4, 5, 6'
                }
            ]
        });
    </script>
@endpush
