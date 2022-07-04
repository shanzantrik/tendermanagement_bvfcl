@extends('admin.layouts.default')
@section('content')
	<div class="container">
	    <div class="row">
			<div class="col-md-9">
				<h3>Departments</h3>
				<?php $count = 1; ?>
				@if(count($results))
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Tender Type</th>
							</tr>
						</thead>
						<tbody>
							@foreach($results as $k => $v)
							<tr>
								<td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
								<td> {{$v->name}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="pagination">
					{!! $results->render() !!}
					</div>
				@else
					<div class="alert alert-warning">
					  <strong>oops !</strong> No results found !
					</div>
				@endif
			</div>
		</div>
	</div>
@stop

