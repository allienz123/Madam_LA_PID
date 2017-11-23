@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/admin.alarm_logs") }}} :: @parent
@stop

{{-- Content --}}
@section('main')

    <div class="page-header">
        <h3>
            {{{ trans("admin/admin.alarm_logs") }}}
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <!-- <th>{{{ trans("admin/admin.no") }}}</th> -->
            <th>{{{ trans("admin/admin.terminal") }}}</th>
            <th>{{{ trans("admin/admin.customer_name") }}}</th>
            <th>{{{ trans("admin/admin.time_log") }}}</th>
            <th>{{{ trans("admin/admin.status") }}}</th>
            <th>{{{ trans("admin/admin.spv") }}}</th>
            <th>{{{ trans("admin/admin.action") }}}</th>
        </tr>
        </thead>
        <thead>
            <tr>
                <td><input type="text" data-column='0' class="search_by_text"></td>
                <td><input type="text" data-column='1' class="search_by_text"></td>
                <td><input type="text" data-column='2' class="search_by_text"></td>
                <td>
                    <select data-column='3' class="search_by_select">
                        <option value=""></option>
                        <option value="0">Open too long</option>
                        <option value="1">Closed properly</option>
                    </select>
                </td>
            </tr>
        </thead>
       <!--  <tfoot>
        <tr>
            <th>{{{ trans("admin/admin.terminal") }}}</th>
            <th>{{{ trans("admin/admin.customer_name") }}}</th>
            <th>{{{ trans("admin/admin.time_log") }}}</th>
            <th>{{{ trans("admin/admin.status") }}}</th>
        </tr>
        </tfoot> -->
        <!-- <tbody></tbody> -->
        
    </table>

    <div><br><b>Export all to :</b>
    <a href="{{ URL::to('operator/alarm/export') }}"><button> Excel</button></a>
  <!--   <td>min: <input id="min" name="min" type="text" ></td>
    <td>max: <input id="max" name="max" type="text" ></td> -->
    </div>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    
    <script type="text/javascript">


        $(document).ready(function () {
        var oTable = $('#table').DataTable({
            "sDom": "<'row'<'col-md-3'B>><'row'<'col-md-3'l><'col-md-5'><'col-md-4'>r>t<'row'<'col-md-6'i> <'col-md-6'p> >",    
            "buttons": ['excel','pdf','print'],
            "sPaginationType": "bootstrap",
            "bProcessing": true,
            "bServerSide": true,
            //"oLanguage": {"sSearch": "Filter Data"},
            // "ajax": "{{ URL::to('operator/alarm/data/') }}",
            "ajax" : {
                url : "{{ URL::to('admin/alarm/data/') }}",
                data  : function (d){
                    d.terminal = $('input[terminal=terminal]').val();
                }
            },
            "order" : [[2, 'desc']],
            
            // "fnDrawCallback" : function(oSettings) {
            // $(".iframe").colorbox({
            //     iframe : true,
            //     width : "80%",
            //     height : "0%",
            //     onClosed : function() {
            //         window.location.reload();
            //     }    
            // });
            // }
             
                "columns": [
                    // {name: 'alarm_logs.id'},
                    {name: 'alarm_logs.terminal'},
                    {name: 'alarm_logs.customer_name'},
                    {name: 'alarm_logs.time_log'},
                    {name: 'alarm_logs.status'},
                    {name: 'alarm_logs.user_id'},
                    {name: 'actions'},
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

    $('#table tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert( data[0] +"'s salary is: "+ data[ 2 ] );
    } );

    
     $('.search_by_text').on( 'keyup change', function () {   // for text boxes
                       var i = $(this).attr('data-column');  // getting column index
                       var v = $(this).val();  // getting search input value
                       oTable.columns(i).search(v).draw();
                   } );

     $('.search_by_select').on( 'change', function () {   // for text boxes
                       var i = $(this).attr('data-column');  // getting column index
                       var v = $(this).val();  // getting search input value
                       oTable.columns(i).search(v).draw();
                   } );


        $(document).on("click", ".alert", function(e) {
            bootbox.alert("Hello world!", function() {
                console.log("Alert Callback");
            });
        });
    


    });  

    //end script
    </script>
   

   
@stop


