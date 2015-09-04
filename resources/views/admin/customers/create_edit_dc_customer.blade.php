@extends('admin.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('admin/dc_customer/' . $user->id . '/edit') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.nojar') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.nojar') }} --}}" type="text"
							name="cid" id="cid"
							value="{{{ Input::old('cid', isset($nojar) ? $nojar->cid : null) }}}">
					</div>
				</div>
			</div>

		<div class="form-group {{{ $errors->has('customer_name') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="name">
						<label class="col-md-2 control-label" for="customer_name">{{
							trans("admin/admin.customer_name") }}</label> 
							<div class="col-md-10">
						<select style="width: 100%" name="customer_name" id="customer_name" class="form-control"> 
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
		
		<div class="form-group {{{ $errors->has('location') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="name">
						<label class="col-md-2 control-label" for="location">{{
							trans("admin/admin.location") }}</label> 
							<div class="col-md-10">
						<select style="width: 100%" name="locations" id="location" class="form-control"> 
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
				<div class="col-md-12 control-label" for="name">
						<label class="col-md-2 control-label" for="service_type">{{
							trans("admin/admin.service_name") }}</label> 
							<div class="col-md-10">
						<select style="width: 100%" name="locations" id="service_type" class="form-control"> 
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
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.ip_address') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.ip_address') }} --}}" type="text"
							name="ip_address" id="ip_address"
							value="{{{ Input::old('ip_address', isset($ip_address) ? $ip_address->ip_address : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.netmask') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.netmask') }} --}}" type="text"
							name="netmask" id="netmask"
							value="{{{ Input::old('netmask', isset($netmask) ? $ip_address->netmask : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.gateway') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.gateway') }} --}}" type="text"
							name="gateway" id="gateway"
							value="{{{ Input::old('gateway', isset($gateway) ? $gateway->gateway : null) }}}">
					</div>
				</div>
		</div>

		<div class="col-md-12">
            <div class="form-group">
                <label class="col-md-2 control-label" for="name">{{ trans('admin/admin.fpb') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" tabindex="1" 
                        placeholder="{{ trans('admin/admin.date') }}" type="text" 
                        name="fpb" id="datepicker_fpb" 
                        value="{{{ Input::old('fpb', isset($datepicker_fpb) ? $datepicker_fpb->fpb : null) }}}">
                    </div>
            </div>         
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-2 control-label" for="name">{{ trans('admin/admin.of') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" tabindex="1" 
                        placeholder="{{ trans('admin/admin.date') }}" type="text" 
                        name="of" id="datepicker_of" 
                        value="{{{ Input::old('of', isset($datepicker_of) ? $datepicker_of->of : null) }}}">
                    </div>
            </div>         
        </div>
		
		<div class="col-md-12">
            <div class="form-group">
                <label class="col-md-2 control-label" for="name">{{ trans('admin/admin.ob') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" tabindex="1" 
                        placeholder="{{ trans('admin/admin.date') }}" type="text" 
                        name="of" id="datepicker_ob" 
                        value="{{{ Input::old('ob', isset($datepicker_ob) ? $datepicker_ob->ob : null) }}}">
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
				    @if	(isset($customers))
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
	$('#datepicker_fpb').datepicker({
		viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
		format: 'dd/mm/yyyy',
		weekStart: 0,
		});
		});
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
	$('#datepicker_of').datepicker({
		viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
		format: 'dd/mm/yyyy',
		weekStart: 0,
		});
		});
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
	$('#datepicker_ob').datepicker({
		viewMode: 2,   //0 for days, 1 for months, 2 for years Bootstrap-datepicker
		format: 'dd/mm/yyyy',
		weekStart: 0,
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


