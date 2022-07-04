@extends('admin.layouts.default')	
@section('content')
<div class="col-md-8">
	<div class="widget box">
		<div class="widget-header">
			<h3>Add New Department</h3>
		</div>
		<div class="widget-content">
			{!! Form::open(array('route' => 'department.store', 'id' => 'scheme_store', 'class' => 'form-horizontal row-border')) !!}
				@include('master_entries.departments._form')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop