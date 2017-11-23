@extends('operator.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/users.users") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/users.users") }}}
            <div class="pull-right">
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{{ trans("admin/users.name") }}}</th>
            <th>{{{ trans("admin/users.username") }}}</th>
            <th>{{{ trans("admin/users.email") }}}</th>
            <th>{{{ trans("admin/users.activated") }}}</th>
            <th>{{{ trans("admin/admin.role") }}}</th>
            <th>{{{ trans("admin/admin.created_at") }}}</th>
            <th>{{{ trans("admin/admin.action") }}}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').DataTable({
                "sDom": "<'row'r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('operator/users/data/') }}",
                "columns": [
                    {name: 'users.name', searchable: false},
                    {name: 'users.username', searchable: false},
                    {name: 'users.email', searchable: false},
                    {name: 'users.confirmed', searchable: false},
                    {name: 'users.admin', searchable: false},
                    {name: 'users.created_at', searchable: false}, 
                    {name: 'actions', searchable: false} 
                    ],
                "fnDrawCallback": function (oSettings) {
                    $(".iframe").colorbox({
                        iframe: true,
                        width: "80%",
                        height: "80%",
                        onClosed: function () {
                            oTable.ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
@stop
