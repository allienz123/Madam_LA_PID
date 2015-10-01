@extends('operator.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	action="@if (isset($user)){{ URL::to('operator/customers/' . $user->id . '/edit') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.customer_name') }}</label>
					<div class="col-md-10">
						<input disabled class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.customer_name') }} --}}" type="text"
							name="customer_name" id="customer_name"
							value="{{{ Input::old('customer_name', isset($customers) ? $customers->customer_name : null) }}}">
					</div>
				</div>
			</div>

			<div class="form-group {{{ $errors->has('customers_segment') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="name">
						<label class="col-md-2 control-label" for="customers_segment">{{
							trans("admin/admin.segment") }}</label> 
							<div class="col-md-10">
						<select disabled style="width: 100%" name="customers_segment" id="customers_segment" class="form-control"> 
							@foreach($segments as $item)
								<option value="{{$item->id}}"
									@if(!empty($segment))
                                    @if($item->id==$segment)
									selected="selected" @endif @endif >{{$item->segment_name}}
								</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.sales') }}</label>
					<div class="col-md-10">
						<input disabled class="form-control" tabindex="1"
							placeholder="{{--{{ trans('admin/admin.sales') }} --}}" type="text"
							name="customer_sales" id="customer_sales"
							{-- Show text inside formbox from database --}
							value="{{{ Input::old('customer_sales', isset($customers) ? $customers->customer_sales : null) }}}">
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.customer_cp') }}</label>
					<div class="col-md-10">
						<input disabled class="form-control" tabindex="1"
							placeholder="{{--{{ trans('admin/admin.sales') }} --}}" type="text"
							name="customer_cp" id="customer_cp"
							value="{{{ Input::old('customer_cp', isset($customers) ? $customers->customer_cp : null) }}}">
					</div>
				</div>
			</div>		
			
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("admin/modal.cancel") }}
			</button>
		</div>
	</div>
</form>
@stop @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});
</script>
@stop
