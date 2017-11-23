@extends('operator.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/admin.cid") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/admin.cid") }}}
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            {{-- <th>{{{ trans("admin/admin.id") }}}</th> --}}
            <th>{{{ trans("admin/admin.cid") }}}</th>
            <th>{{{ trans("admin/admin.service_name") }}}</th>
            <th>{{{ trans("admin/admin.customer_name") }}}</th>
            <th>{{{ trans("admin/admin.location") }}}</th>
            <th>{{{ trans("admin/admin.rack_location") }}}</th> 
            <th>{{{ trans("admin/admin.action") }}}</th> 
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div><br><b>Export to :</b>
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
                "sDom": "<'row'<'col-md-3'l><'col-md-5'><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p> >",
                "sPaginationType": "bootstrap",
                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('operator/cid/data/'.((isset($album))?$album->id:0)) }}",
                "columns": [
                    {name: 'dc_customers.cid', searchable: true},
                    {name: 'dc_customers.service_name' ,searchable: false},
                    {name: 'dc_customers.customer_name' ,searchable: false},
                    {name: 'dc_customers.location_name' ,searchable: false},   
                    {name: 'album_id', searchable: false} ,
                    {name: 'dc_customers.rack_location', searchable: true} 


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
