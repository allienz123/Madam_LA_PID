@extends('operator.layouts.default')

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
        <tbody></tbody>
        
    </table>

    <div><br><b>Export all to :</b>
    <a href="{{ URL::to('operator/alarm/export') }}"><button> Excel</button></a>
    <!-- <td>min: <input id="min" name="min" type="text" ></td>
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
                url : "{{ URL::to('operator/alarm/data/') }}",
                data  : function (d){
                    d.terminal = $('input[terminal=terminal]').val();
                }
            },
            "order" : [[2, 'desc']],
             // "fnServerParams": function (aoData, fnCallback) {

             //             aoData.push(  {"name": "min", "value":  $('#min').val() } );
             //             aoData.push(  {"name": "max", "value":  $('#max').val() } );
             //       },
        //     "aoColumns": [{"sTitle": "Engine"}, {"sTitle": "Browser"}, {"sTitle": "Platform"}, 
        //     {"sTitle": "Version","sClass": "center"}, {"sTitle": "Grade","sClass": "center",
        //     "fnRender": function (obj) {
        //         var sReturn = obj.aData[obj.iDataColumn];
        //         if (sReturn === "A") {
        //             sReturn = "<b>A</b>";
        //         }
        //         return sReturn;
        //     }
        // }],
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

        //$.columnFilter();

       

        // // Apply the search
        //    oTable.columns().every( function () {
        //        var that = this;
        
        //        $( 'input', this.footer() ).on( 'keyup change', function () {
        //            if ( that.search() !== this.value ) {
        //                that
        //                    .search( this.value )
        //                    .draw();
        //            }
        //        } );
        //    } );

       // $('#search-form').keyup( function() { oTable.draw(); } );

        // var oTable = $('#table').columnFilter({
        //     "sPlaceHolder" : "head:before",
        //     "aoColumns" :  {type: "date-range"}
            
        // });

        // $('#min, #max').keyup( function() {
        //  oTable.draw(); 
        //  });
        
    //$('#min, #max').change( function() { oTable.draw(); } );
         
    
    // $('#min').datepicker({
    //         viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
    //         //format: 'dd-M-yyyy',
    //         format: 'yyyy-mm-dd',
    //         weekStart: 0,
    //         todayBtn: 'linked',
    //         keyboardNavigation: 'true',
    //         autoclose: 'true',
    //         // "onSelect" : function(date) {
    //         //   min = new Date(date).getTime();
    //         //   oTable.Draw();
    //         // }
    // }).change( function() { oTable.draw(); } );

    // $('#max').datepicker({
    //         viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
    //         //format: 'dd-M-yyyy',
    //         format: 'yyyy-mm-dd',
    //         weekStart: 0,
    //         todayBtn: 'linked',
    //         keyboardNavigation: 'true',
    //         autoclose: 'true',
    //         // "onSelect" : function(date) {
    //         //   max = new Date(date).getTime();
    //         //   oTable.Draw();
    //         // }
    // }).change( function() { oTable.draw(); });


     
     // $.fn.dataTableExt.afnFiltering.push(

     //            function( oSettings, aData, iDataIndex ) {
                    
     //                var today = new Date();
     //                var dd = today.getDate();
     //                var mm = today.getMonth() + 1;
     //                var yyyy = today.getFullYear();
                    
     //                if (dd<10)
     //                dd = '0'+dd;
                    
     //                if (mm<10)
     //                mm = '0'+mm;
                    
     //                today = mm+'/'+dd+'/'+yyyy;
     //                //today = yyyy+'/'+mm+'/'+dd;
                    
     //                if ($('#min').val() != '' || $('#max').val() != '') {
     //                var iMin_temp = $('#min').val();
     //                if (iMin_temp == '') {
     //                  iMin_temp = '01/01/1980';
     //                  //iMin_temp = '1980/01/01';
     //                }
                    
     //                var iMax_temp = $('#max').val();
     //                if (iMax_temp == '') {
     //                  iMax_temp = today;
     //                }
                
     //                var arr_min = iMin_temp.split("/"); //01,01,1980
     //                var arr_max = iMax_temp.split("/"); //mm,dd,yyyy
     //                //var x = $(this).attr('data-column');
     //                var arr_date = aData[3].split("-"); //yyyy,mm,dd

     //                //new Date(year,month,date[,hour,minute,second,millisecond ])
          
     //                var iMin = new Date(arr_min[2], arr_min[0], arr_min[1], 0, 0, 0, 0)
     //                var iMax = new Date(arr_max[2], arr_max[0], arr_max[1], 0, 0, 0, 0)
     //                var iDate = new Date(arr_date[0], arr_date[1], arr_date[2], 0, 0, 0, 0)
                    
     //                if ( iMin == "" && iMax == "" )
     //                {
     //                    return true;
     //                }
     //                else if ( iMin == "" && iDate < iMax )
     //                {
     //                    return true;
     //                }
     //                else if ( iMin <= iDate && "" == iMax )
     //                {
     //                    return true;
     //                }
     //                else if ( iMin <= iDate && iDate <= iMax )
     //                {
     //                    return true;
     //                }
     //                return false;
     //                }
     //            }
     //        );

//  $.fn.dataTableExt.afnFiltering.push(
//     function( oSettings, aData, iDataIndex ) {
//         var iFini = $('#min').val();
//         var iFfin = $('#max').val();
//         var iStartDateCol = 3;
//         var iEndDateCol = 3;
 
//         iFini=iFini.substring(0,4) + iFini.substring(5,7)+ iFini.substring(8,10);
//         iFfin=iFfin.substring(0,4) + iFfin.substring(5,7)+ iFfin.substring(8,10);
 
//         var datofini=aData[iStartDateCol].substring(0,4) + aData[iStartDateCol].substring(5,7)+ aData[iStartDateCol].substring(8,10);
//         var datoffin=aData[iEndDateCol].substring(0,4) + aData[iEndDateCol].substring(5,7)+ aData[iEndDateCol].substring(8,10);
 
//         if ( iFini === "" && iFfin === "" )
//         {
//             return true;
//         }
//         else if ( iFini <= datofini && iFfin === "")
//         {
//             return true;
//         }
//         else if ( iFfin >= datoffin && iFini === "")
//         {
//             return true;
//         }
//         else if (iFini <= datofini && iFfin >= datoffin)
//         {
//             return true;
//         }
//         return false;
//     }
// );

    // $('#table tfoot th').each( function () {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="'+title+'" />' );
    // });

    // // Apply the search
    // oTable.columns().every( function () {
    //     var that = this;
 
    //     $( 'input', this.footer() ).on( 'keyup change', function () {
    //         if ( that.search() !== this.value ) {
    //             that
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // });
    
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


