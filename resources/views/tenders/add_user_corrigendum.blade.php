@extends('layouts.app')	
@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-8">
			<div class="widget box">
				<div class="widget-header">
					<h3>Add Corrigendum</h3>
				</div>
				<div class="widget-content">
					{!! Form::open(array('route' => 'corrigendum_tender.user.store', 'id' => 'corrigendum.tender.user.store','files' => true,  'class' => 'form-horizontal row-border')) !!}
						@include('tenders._corrigendum')
						<div class="form-actions">
						    {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
						</div>
					{!!form::close()!!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop