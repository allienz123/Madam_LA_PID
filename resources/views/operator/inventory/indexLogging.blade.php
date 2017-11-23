@extends('operator.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/admin.logging") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            <b>{{{ trans("admin/admin.logging") }}}</b>
        </h3>
    </div>
    <!-- <div class="col-md-4">
                <div align="center">
                    <img src="{{asset('assets/site/images/barcode_scaner.png')}}" />
                </div>
    </div> -->
    <div class="container">

    </div>

    <div class="page-header">
        <h4><b>Input Inventory</b></h4>
    </div>

    <div class="container">
        <div class="row">
            <div class="control-group">
              <form class="form-inline" action="{{ URL::to('operator/logging/add') }}" method="post" autocomplete="off">
    <!--           <form action="{{ URL::to('operator/logging/add') }}" method="post">
     -->                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group">
                        <label for="pic">PIC : </label>
                        <input class="form-control" name="pic" type="text" id="pic"/>
                    </div>

                    <div class="form-group">
                        <label for="pic">Company : </label>
                        <input class="form-control" name="company" type="text" id="company"/>
                    </div>

                    <div id="box" class="controls">
                  <!--   @if(isset($videoalbum)){{ URL::to('admin/videoalbum/'.$videoalbum->id.'/edit') }}
                @else{{ URL::to('admin/videoalbum/create') }}@endif -->
                        <p>
                            <input class="form-control" name="device[1]" type="text" id="device" placeholder="Device 1" />
                            <input readonly="readonly" class="form-control" name="time[1]" type="text" id="time" placeholder="Barcode ID 1" />
                            <input class="form-control" name="sn[1]" type="text" id="sn" placeholder="Serial Number" />
                            <input class="form-control" name="notes[1]" type="text" id="notes" placeholder="Notes" />     
                            <button id="add" class="btn btn-sm btn-success add" type="button">
                                <span class="glyphicon glyphicon-plus"></span> 
                            </button>
                        </p>
                    </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-success"> Submit</button>
                </div>

               </form>
            </div>  
        </div>
    </div> 
    
@endsection

{{-- Scripts --}}
@section('scripts')
<script>

$(document).ready(function(){
    
    var inp = $('#box');  
    var i = $('#box p').size() + 1;

    var currentTime = new Date();
    var year = currentTime.getFullYear();
    var month = currentTime.getMonth() + 1; //Get real month because January start with 0
    var date = currentTime.getDate();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    var miliseconds = currentTime.getMilliseconds();

    document.getElementById("time").value = ""+year+month+date+hours+minutes+seconds+miliseconds;

    $('#box').on('click','.add', function(e){
        
        e.preventDefault();
        $('#box p').last().find(".remove").hide();

        var currentTime = new Date();
        var year = currentTime.getFullYear();
        var month = currentTime.getMonth() + 1;
        var date = currentTime.getDate();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var miliseconds = currentTime.getMilliseconds();

        var box_html = $('<div id="box' + i +'"><p><input class="form-control" type="text" id="device" name="device['+i+']" placeholder="Device '+i+'"/>  <input readonly="readonly" class="form-control" type="text" id="time" name="time['+i+']" placeholder="Time '+i+'" value="'+year+month+date+hours+minutes+seconds+miliseconds+'" />  <input class="form-control" type="text" id="sn" name="sn['+i+']" placeholder="Serial Number"/>  <input class="form-control" type="text" id="notes" name="notes['+i+']" placeholder="Notes"/>  <button id="add" type="button" class="btn btn-sm btn-success add"> <span class="glyphicon glyphicon-plus"></span></button></button> <button id="remove" type="button" class="btn btn-sm btn-danger remove"> <span class="glyphicon glyphicon-minus"></button> <br></p></div>').appendTo(inp);
        $(this).hide();
        i++;
        return false;
        
    });     
    
    $('body').on('click','#remove',function(e){
            e.preventDefault();
                    //$(this).parent().parent().css( 'background-color', '#FF6C6C' );
             $(this).parent().fadeOut('fast', function() {
                    //$(this).parent().parent().css( 'background-color', '#FFFFFF' );
                    if(i>2){
                    $(this).closest('p').remove();
                    i-- ;
                }
                    $('#box p').last().find(".add").show();
                    $('#box p').last().find(".remove").show();
                    return false;
                }); 
    });
        
});

</script>
   
@endsection
