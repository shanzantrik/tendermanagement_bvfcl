@extends('admin.layouts.default')	
@section('content')
<div class="col-md-8">
	<div class="widget box">
		<div class="widget-header">
			<h3>Add Corrigendum</h3>
		</div>
		<div class="widget-content">
			{!! Form::open(array('route' => 'corrigendum_tender.store', 'id' => 'corrigendum.tender.store','files' => true, 'class' => 'form-horizontal row-border')) !!}
				@include('tenders._corrigendum')
			<div class="form-actions">
			    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			</div>
			{!!form::close()!!}
			
		</div>
	</div>
</div>
@stop