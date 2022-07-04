@extends('admin.layouts.default')	
@section('content')
<div class="col-md-8">
	<div class="widget box">
		<div class="widget-header">
			<h3>Add New User</h3>
		</div>
		<div class="widget-content">
			{!! Form::open(array('route' => 'user.store', 'id' => 'user_store', 'class' => 'form-horizontal row-border')) !!}
				@include('master_entries.users._form')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop