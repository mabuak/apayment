<table class="table table-bordered table-hover table-striped table-condensed" id="create-table" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="text-center" style="vertical-align: middle">@lang('auth.form_role_module_label')</th>
        <th class="text-center" style="vertical-align: middle">All</th>
        <th class="text-center" width="80">@lang('auth.form_role_create_label')</th>
        <th class="text-center" width="80">@lang('auth.form_role_update_label')</th>
        <th class="text-center" width="80">@lang('auth.form_role_view_label')</th>
        <th class="text-center" width="80" style="color: red">@lang('auth.form_role_delete_label')</th>
        <th class="text-center">@lang('auth.form_role_miscellaneous_label')</th>
    </tr>
    </thead>

    <tbody>
    @include('backend.role.paymentItem')
    @include('backend.role.role')
    @include('backend.role.user')
    </tbody>
</table>

<!-- DataTables -->
@include('component.datatables.css')
@include('component.datatables.js')

<script>
    $(function () {
        var oTable = $('#create-table').DataTable({
            ordering: false,
            stateSave: true,
            bPaginate: false,
            bInfo: false,
            responsive: true,
            processing: true,
            bFilter: true,
            fixedHeader: true,
            @if(Session::get('locale') == 'cn')
            language: {url: '{{url('plugins/datatables/language/chinese.json')}}'},
            @endif
            columns: [
                {orderable: true, searchable: true},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
                {orderable: false, searchable: false},
            ]
        });
    });
</script>


<script>

    $('#all').on('click', function () {
        var all = $('#all');
        if (all.is(":checked")) {
            $('.styled').prop('checked', true);
        } else {
            $('.styled').prop('checked', false);
        }
    });
</script>