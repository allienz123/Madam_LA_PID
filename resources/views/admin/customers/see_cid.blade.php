@extends('admin.layouts.see') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	 action="@if (isset($user)){{ URL::to('admin/cid/' . $user->id . '/see') }}@endif" 
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
							value="{{{ Input::old('cid', isset($dccustomer) ? $dccustomer->cid : null) }}}" disabled>
					</div>
				</div>
			</div>

		<div class="form-group {{{ $errors->has('customer_id') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="name">
						<label class="col-md-2 control-label" for="customer_id">{{
							trans("admin/admin.customer_name") }}</label> 
							<div class="col-md-10">
						<select disabled style="width: 100%" name="customer_id" id="customer_id" class="form-control"> 
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
						<select disabled style="width: 100%" name="dc_location" id="dc_location" class="form-control"> 
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
						<select disabled style="width: 100%" name="service_type" id="service_type" class="form-control"> 
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
						<input disabled class="form-control" tabindex="1"
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
						<input disabled class="form-control" tabindex="1"
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
						<input disabled class="form-control" tabindex="1"
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
                        <input disabled class="form-control" tabindex="1" 
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
                        <input disabled class="form-control" tabindex="1" 
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
                        <input disabled class="form-control" tabindex="1" 
                        placeholder="{{ trans('admin/admin.date') }}" type="text" 
                        name="ob_date" id="ob_date" 
                        value="{{{ Input::old('ob_date', isset($dccustomer) ? date("d-M-Y", strtotime($dccustomer->ob_date)) : null) }}}">
                    </div>
            </div>         
        </div>

		</div>  {{-- End Div General--}}
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("admin/modal.back") }}
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


