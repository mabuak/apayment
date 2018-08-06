@extends('backend.layout.app')

@section('content')
    <section id="content" class="animated fadeIn">
        @include('component.flash')
        
        <div class="panel panel-visible">
            <div class="panel-heading">
                <div class="panel-title hidden-xs">
                    <span class="glyphicon glyphicon-tasks"></span>@lang('auth.index_role_list')
                </div>
            </div>
            
            <div class="panel-menu">
                <a href="{{route('role.create')}}" class="btn btn-flat btn-success btn-sm">@lang('auth.form_role_add_title')</a>
            </div>
            
            <table class="table table-striped table-bordered table-hover table-condensed" id="users-table" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('auth.index_name_th')</th>
                    <th>@lang('auth.index_slug_th')</th>
                    <th>@lang('auth.index_created_at')</th>
                    <th>@lang('auth.index_updated_at')</th>
                    <th>@lang('auth.index_action_th')</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </section>

@stop

@push('css')
@include('component.datatables.css')
@endpush

@push('scripts')

@include('component.datatables.js')

    <script>
        $(function () {
            $('#users-table').DataTable({
                aaSorting     : [[0, 'desc']],
                iDisplayLength: 25,
                stateSave     : true,
                responsive    : true,
                processing    : true,
                serverSide    : true,
                pagingType    : "full_numbers",
                dom           : '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
                language: {url: '{{ Session::get('locale') ? url('plugins/datatables/language/'. Session::get('locale') .'.json') : url('plugins/datatables/language/en.json')}}'},
                ajax          : {
                    url     : '{!! route('role.ajax.datatable') !!}',
                    dataType: 'json'
                },
                columns       : [
                    {data: 'id', name: 'id', visible: false},
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {
                        data           : 'action', name: 'action', orderable: false, searchable: false,
                        "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                            //  console.log( nTd );
                            $("a", nTd).tooltip({container: 'body'});
                        }
                    }
                ]
            });
        });
    </script>
@endpush
