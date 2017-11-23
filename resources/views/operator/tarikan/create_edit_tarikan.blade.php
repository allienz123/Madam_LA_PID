@extends('operator.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	 action="@if (isset($user)){{ URL::to('operator/activity/' . $user->id . '/edit') }}@endif" 
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
							value="{{{ Input::old('cid', isset($tarikankabel) ? $tarikankabel->cid : null) }}}">
					</div>
				</div>
			</div>

		<div class="form-group {{{ $errors->has('nama_pelanggan') ? 'has-error' : '' }}}">
				<div class="col-md-12 control-label" for="name">
						<label class="col-md-2 control-label" for="nama_pelanggan">{{
							trans("admin/admin.customer_name") }}</label> 
							<div class="col-md-10">
						<select style="width: 100%" name="nama_pelanggan" id="nama_pelanggan" class="form-control"> 
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
		
		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="requester">{{
						trans('admin/admin.requester') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.requester') }} --}}" type="text"
							name="requester" id="requester"
							value="{{{ Input::old('requester', isset($tarikankabel) ? $tarikankabel->requester : null) }}}">
					</div>
				</div>
		</div>


		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="datek_from">{{
						trans('admin/admin.datek_from') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.datek_from') }} --}}" type="text"
							name="datek_from" id="datek_from"
							value="{{{ Input::old('datek_from', isset($tarikankabel) ? $tarikankabel->datek_from : null) }}}">
					</div>
				</div>
		</div>	
	
		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="datek_to">{{
						trans('admin/admin.datek_to') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.datek_to') }} --}}" type="text"
							name="datek_to" id="datek_to"
							value="{{{ Input::old('datek_to', isset($tarikankabel) ? $tarikankabel->datek_to : null) }}}">
					</div>
				</div>
		</div>	

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="via">{{
						trans('admin/admin.via') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.via') }} --}}" type="text"
							name="via" id="via"
							value="{{{ Input::old('via', isset($tarikankabel) ? $tarikankabel->via : null) }}}">
					</div>
				</div>
		</div>	

		<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="status">{{
						trans('admin/admin.status') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.status') }} --}}" type="text"
							name="status" id="status"
							value="{{{ Input::old('status', isset($tarikankabel) ? $tarikankabel->status : null) }}}">
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
				    @if	(isset($tarikankabel))
				        {{ trans("admin/modal.edit") }}
				    @else
				        {{trans("admin/modal.create") }}
				    @endif
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


