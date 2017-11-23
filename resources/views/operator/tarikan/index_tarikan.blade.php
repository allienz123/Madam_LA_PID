@extends('operator.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/admin.data_cable") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/admin.data_cable") }}}
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{{ URL::to('operator/activity/create') }}}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> {{
					trans("admin/modal.new") }}</a>
                </div>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            {{-- <th>{{{ trans("admin/admin.id") }}}</th> --}}
            <th>{{{ trans("admin/admin.cid") }}}</th>
            <th>{{{ trans("admin/admin.customer_name") }}}</th>
            <th>{{{ trans("admin/admin.requester") }}}</th>
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
                "sDom": "<'row'<'col-md-3'l><'col-md-5'><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p> >",
                "sPaginationType": "bootstrap",
                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('operator/activity/data/') }}",
                "columns": [
                    {name: 'tarikankabel.id', searchable: false},
                    {name: 'tarikankabel.cid', searchable: true},
                    {name: 'tarikankabel.nama_pelanggan', searchable: false},
                    {name: 'tarikankabel.requester', searchable: true}
                     

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
