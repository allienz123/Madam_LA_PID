@extends('admin.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{{
			trans('admin/modal.general') }}}</a></li>
</ul>
<form class="form-horizontal" method="post"
	action="@if (isset($service)){{ URL::to('admin/servicetype/' . $service->id . '/edit') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="tab-content">
		<div class="tab-pane active" id="tab-general">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label" for="name">{{
						trans('admin/admin.service_name') }}</label>
					<div class="col-md-10">
						<input class="form-control" tabindex="1"
							placeholder="" type="text" name="service_name" id="service_name"
							value="{{{ Input::old('service_name', isset($service) ? $service->service_name : null) }}}">
					</div>
				</div>
			</div>

				<div class="form-group {{{ $errors->has('it_services') ? 'has-error' : '' }}}">
						<label class="col-md-2 control-label" for="it_services">{{{
							trans('admin/admin.services') }}}</label>
							<label class="col-md-3 radio"><span class="pull-right">{!! Form::radio('it_services', 1, (Input::old('it_services') == '1' || (isset($service) &&
							     $service->it_services == '1')) ? true : false,
							         array('id'=>'showtitle', 'class'=>'radio')) !!} 
							{{{	trans('admin/admin.it_services') }}}</span> </label>
							<label class="col-md-3 radio"><span class="pull-right">
							{!! Form::radio('it_services', 0, (Input::old('it_services') ==	'0' || (isset($service) && $service->it_services == '0') ||
							!isset($service)) ? true : false, array('id'=>'showtitle',
							'class'=>'radio')) !!} 
							{{{ trans('admin/admin.datacom') }}}</span> </label>
				</div>
			
		</div>
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
				    @if	(isset($service))
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
