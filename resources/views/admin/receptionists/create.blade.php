@extends('admin.layouts.default')	
@section('content')
<h3>Add New Receptionist</h3>

<div class="col-md-8">
	<div class="widget box">
		<div class="widget-header">
			<h3>Add New Receptionist</h3>
		</div>
		<div class="widget-content">
			{!! Form::open(array('route' => 'receptionist.store', 'id' => 'scheme_store', 'class' => 'form-horizontal row-border')) !!}
				@include('admin.receptionists._form')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop