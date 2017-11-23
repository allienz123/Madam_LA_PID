@extends('operator.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	 action="@if (isset($user)){{ URL::to('admin/dc_customer/' . $user->id . '/edit') }}@endif" 
	 {{-- action="@if(isset($user)){{ URL::to('operator/alarm/'.$user->id.'/edit') }}@else{{ URL::to('admin/cid/create') }}@endif"--}}
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general"></br>
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="notes">{{
						trans('admin/admin.note') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="{{-- {{ trans('admin/admin.nojar') }} --}}" type="text"
							name="notes" id="notes"
							value="{{{ Input::old('notes', isset($logs) ? $logs->notes : null) }}}">
					</div>
				</div>
			</div>

		</div>  {{-- End Div General--}}
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				    Submit
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


