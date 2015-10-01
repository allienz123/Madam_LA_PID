@extends('admin.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	 action="@if (isset($user)){{ URL::to('admin/dc_customer/' . $user->id . '/edit') }}@endif" 
	 {{-- action="@if(isset($dccustomer)){{ URL::to('admin/cid/'.$dccustomer->id.'/edit') }}@else{{ URL::to('admin/cid/create') }}@endif"--}}
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general"></br>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="cid">{{
						trans('admin/admin.nojar') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.nojar') }} --}}" type="text"
							name="cid" id="cid"
							value="{{{ Input::old('cid', isset($dccustomer) ? $dccustomer->cid : null) }}}">
					</div>
				</div>
			</div>

		<div class="form-group {{{ $errors->has('customer_id') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="name">
						<label class="col-md-2 control-label" for="customer_id">{{
							trans("admin/admin.customer_name") }}</label> 
							<div class="col-md-10">
						<select style="width: 100%" name="customer_id" id="customer_id" class="form-control"> 
							@foreach($customers as $item)
								<option value="{{$item->id}}"
									@if(!empty($customer))
                                    @if($item->id==$customer)
									selected="selected" @endif @endif >{{$item->customer_name}}
								</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		
		<div class="form-group {{{ $errors->has('dc_location') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="dc_location">
						<label class="col-md-2 control-label" for="dc_location">{{
							trans("admin/admin.location") }}</label> 
							<div class="col-md-10">
						<select style="width: 100%" name="dc_location" id="dc_location" class="form-control"> 
							@foreach($locations as $item)
								<option value="{{$item->id}}"
									@if(!empty($location))
                                    @if($item->id==$location)
									selected="selected" @endif @endif >{{$item->location_name}}
								</option>
							@endforeach
						</select>
					</div>
				</div>
		</div>

		<div class="form-group {{{ $errors->has('service_type') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="service_type">
						<label class="col-md-2 control-label" for="service_type">{{
							trans("admin/admin.service_name") }}</label> 
							<div class="col-md-10">
						<select style="width: 100%" name="service_type" id="service_type" class="form-control"> 
							@foreach($service_types as $item)
								<option value="{{$item->id}}"
									@if(!empty($service_type))
                                    @if($item->id==$service_type)
									selected="selected" @endif @endif >{{$item->service_name}}
								</option>
							@endforeach
						</select>
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="ip_address">{{
						trans('admin/admin.ip_address') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.ip_address') }} --}}" type="text"
							name="ip_address" id="ip_address"
							value="{{{ Input::old('ip_address', isset($dccustomer) ? $dccustomer->ip_address : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="netmask">{{
						trans('admin/admin.netmask') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.netmask') }} --}}" type="text"
							name="netmask" id="netmask"
							value="{{{ Input::old('netmask', isset($dccustomer) ? $dccustomer->netmask : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="gateway">{{
						trans('admin/admin.gateway') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.gateway') }} --}}" type="text"
							name="gateway" id="gateway"
							value="{{{ Input::old('gateway', isset($dccustomer) ? $dccustomer->gateway : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
            <div class="form-group">
                <label class="col-md-2 control-label" for="fpb_date">{{ trans('admin/admin.fpb') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" tabindex="1" 
                        placeholder="{{ trans('admin/admin.date') }}" type="text" 
                        name="fpb_date" id="fpb_date" 
                        value="{{{ Input::old('fpb_date', isset($dccustomer) ? date("d-M-Y", strtotime($dccustomer->fpb_date)) : null) }}}">
                    </div>
            </div>         
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-2 control-label" for="of_date">{{ trans('admin/admin.of') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" tabindex="1" 
                        placeholder="{{ trans('admin/admin.date') }}" type="text" 
                        name="of_date" id="of_date" 
                        value="{{{ Input::old('of_date', isset($dccustomer) ? date("d-M-Y", strtotime($dccustomer->of_date)) : null) }}}">
                    </div>
            </div>         
        </div>
		
		<div class="col-md-12">
            <div class="form-group">
                <label class="col-md-2 control-label" for="ob_date">{{ trans('admin/admin.ob') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" tabindex="1" 
                        placeholder="{{ trans('admin/admin.date') }}" type="text" 
                        name="ob_date" id="ob_date" 
                        value="{{{ Input::old('ob_date', isset($dccustomer) ? date("d-M-Y", strtotime($dccustomer->ob_date)) : null) }}}">
                    </div>
            </div>         
        </div>

        <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="rack_location">{{
						trans('admin/admin.rack_location') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.gateway') }} --}}" type="text"
							name="rack_location" id="rack_location"
							value="{{{ Input::old('rack_location', isset($dccustomer) ? $dccustomer->rack_location : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="u_location">{{
						trans('admin/admin.u_location') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.gateway') }} --}}" type="text"
							name="u_location" id="u_location"
							value="{{{ Input::old('u_location', isset($dccustomer) ? $dccustomer->u_location : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="port">{{
						trans('admin/admin.port') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.gateway') }} --}}" type="text"
							name="port" id="port"
							value="{{{ Input::old('port', isset($dccustomer) ? $dccustomer->port : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="power">{{
						trans('admin/admin.power') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.gateway') }} --}}" type="text"
							name="power" id="power"
							value="{{{ Input::old('power', isset($dccustomer) ? $dccustomer->power : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="notes">{{
						trans('admin/admin.note') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.gateway') }} --}}" type="text"
							name="notes" id="notes"
							value="{{{ Input::old('notes', isset($dccustomer) ? $dccustomer->notes : null) }}}">
					</div>
				</div>
		</div>

		</div>  {{-- End Div General--}}
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("admin/modal.cancel") }}
			</button>
			<button type="reset" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-remove-circle"></span> {{
				trans("admin/modal.reset") }}
			</button>
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				    @if	(isset($dccustomer))
				        {{ trans("admin/modal.edit") }}
				    @else
				        {{trans("admin/modal.create") }}
				    @endif
			</button>
		</div>
	</div>
</form>


@section('scripts')
<script src="{{ elixir('js/admin.js') }}"></script>
<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
<script type="text/javascript">
	$(document).ready(function() {
	//$('#fpb_date').val(" ");
	$('#fpb_date').datepicker({
		viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
		format: 'dd-M-yyyy',	
		weekStart: 0,
		todayBtn: 'linked',
		keyboardNavigation: 'true',
		autoclose: 'true',
		});
		});
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
	$('#of_date').datepicker({
		viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
		format: 'dd-M-yyyy',
		weekStart: 0,
		todayBtn: 'linked',
		keyboardNavigation: 'true',
		autoclose: 'true',
		});
		});
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
	$('#ob_date').datepicker({
		viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
		format: 'dd-M-yyyy',
		weekStart: 0,
		todayBtn: 'linked',
		keyboardNavigation: 'true',
		autoclose: 'true',
		});
		});
	</script>
@stop
@stop @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});
</script>
@stop


