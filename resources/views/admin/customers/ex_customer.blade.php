@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/admin.list_customer") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
    @if ( Session::has('flash_message') )
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @endif 
        <h3>
            {{{ trans("admin/admin.ex_customer") }}}
        </h3>
    </div>
    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            {{-- <th>{{{ trans("admin/admin.id") }}}</th> --}}
            <th>{{{ trans("admin/admin.customer_name") }}}</th>
            <th>{{{ trans("admin/admin.sales_name") }}}</th>
            <th>{{{ trans("admin/admin.segment") }}}</th>
            <th>{{{ trans("admin/admin.fpc") }}}</th>
            <th>{{{ trans("admin/admin.action") }}}</th>
        </tr>
        </thead>
        <tbody>
        </tbody>

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
                "ajax": "{{ URL::to('admin/excustomer/data/') }}",
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
