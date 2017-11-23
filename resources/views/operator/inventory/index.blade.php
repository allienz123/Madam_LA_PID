@extends('operator.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/admin.list_inventory") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/admin.list_inventory") }}}
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            {{-- <th>{{{ trans("admin/admin.id") }}}</th> --}}
            <th>{{{ trans("admin/admin.barcode") }}}</th>
            <th>{{{ trans("admin/admin.device") }}}</th>
            <th>{{{ trans("admin/admin.sn") }}}</th>
            <th>{{{ trans("admin/admin.status") }}}</th>
            <th>{{{ trans("admin/admin.customer_name") }}}</th>
            <th>{{{ trans("admin/admin.action") }}}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>

    <div><br><b>Export all to :</b>
    <a href="{{ URL::to('operator/customers/export') }}"><button> Excel</button></a>
    </div>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').DataTable({
                "dom": "<'row'<'col-md-3'B>><'row'<'col-md-3'l><'col-md-5'><'col-md-4'f>r>t<'row'<'col-md-6'i> <'col-md-6'p> >",    
                "buttons": ['excel','pdf','print'],
                "sPaginationType": "bootstrap",
                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('operator/inventory/data/') }}",
                "columns": [
                    {name: 'inventory.barcode'},
                    {name: 'inventory.device'},
                    {name: 'inventory.sn_ori'},
                    {name: 'inventory.status'},
                    {name: 'customers.customer_name'},
                    {name: 'action'},
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
 $('#table tfoot th').each( function () {
        var title = $('#table thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
         } );


        });
    </script>
@stop