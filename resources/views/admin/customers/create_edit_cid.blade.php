@extends('admin.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	 action="@if (isset($user)){{ URL::to('admin/dc_customer/' . $user->id . '/edit') }}@endif" 
	 {{-- action="@if(isset($dccustomer)){{ URL::to('admin/dc_customer/'.$dccustomer->id.'/edit') }}@else{{ URL::to('admin/dc_customer/create') }}@endif"--}}
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
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

@stop @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2()
	});
</script>
@stop