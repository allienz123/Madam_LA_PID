@extends('operator.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/admin.list_inventory") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/admin.view_detail") }}}
        </h3>
    </div>
<div class="row">
    <div class="col-md-4 col-xs-12">
            <fieldset>
                <legend>Barcode ID :</legend>
                <div align="center">
                <?php echo DNS1D::getBarcodeHTML($inventory->barcode, "C128", 2.5,90); ?>
                {{ $inventory->barcode}} </div>
                </table>
             </fieldset>
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            <label class="col-xs-4 control-label" for="device">Device</label>
                <div class="col-xs-12">
                    <input class="form-control" tabindex="1" type="text" name="device" id="device" value="{{{ Input::old('device', isset($inventory) ? $inventory->device : null) }}}"><br>
                </div>
            <label class="col-xs-4 control-label" for="function">Function</label>
                <div class="col-xs-12">
                    <input class="form-control" tabindex="1" type="text" name="function" id="function" value="{{{ Input::old('function', isset($inventory) ? $inventory->function : null) }}}"><br>

                </div>
            <label class="col-xs-4 control-label" for="notes">Notes</label>
                <div class="col-xs-12">
                    <input class="form-control" tabindex="1" type="text" name="notes" id="notes" value="{{{ Input::old('notes', isset($inventory) ? $inventory->notes : null) }}}"><br>
                </div>
        </div> 
    </div>
    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            <label class="col-xs-4 control-label" for="sn">S/N</label>
                <div class="col-xs-12">
                    <input class="form-control" tabindex="1" type="text" name="sn" id="sn" value="{{{ Input::old('sn', isset($inventory) ? $inventory->sn_ori : null) }}}"><br>
                </div>
            <label class="col-xs-4 control-label" for="belong_to">Owner</label>
                <div class="col-xs-12">
                   <select style="width: 100%" name="owner" id="owner" class="form-control"> 
                            <option value=""></option>
                                @foreach($ownership as $item)
                                <option value="{{$item->id}}"
                                    @if(!empty($owner))
                                    @if($item->id==$owner)
                                    selected="selected" @endif @endif >{{$item->customer_name}}
                                </option>
                            @endforeach
                        </select><br>
                </div>
            <label class="col-xs-4 control-label" for="status">Status</label>
                <div class="col-xs-12">
                    <input class="form-control" tabindex="1" type="text" name="status" id="status" value="{{{ Input::old('status', isset($inventory) ? $status : null) }}}"><br>
                </div>

        </div> 
    </div>

</div>
   


   
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
   
@stop
