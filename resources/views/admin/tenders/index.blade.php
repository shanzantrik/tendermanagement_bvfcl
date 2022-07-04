@extends('admin.layouts.default')
@section('content')
	<div class="container">
	    <div class="row">
			<div class="col-md-9">
				<h3>Tenders</h3>
				<?php $count = 1; ?>
				@if(count($tenders))
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Department</th>
								<th>Tender ID</th>
								<th>Tender Number</th>
								<th>Tender Type</th>
                <th>Bid Type</th>
                <th>Class of Tender</th>
								<th>Tender Opening Date</th>	
							</tr>
						</thead>
						<tbody>
							@foreach($tenders as $k => $v)
							<tr  @if($v->tender_opening_date < date('Y-m-d')) class="danger" @endif>
								<td> {{ (($tenders->currentPage() - 1 ) * $tenders->perPage() ) + $count + $k }} </td>
								<td> {{ $v->department['name']}}
								<td> {{$v->tender_id}}</td>
								<td> {{$v->tender_number}}</td>
								<td> {{$v->tender_type['name']}}</td>
                <td> {{$v->bid_type}}</td>
                <td> {{$v->tender_class}}</td>
								<td> {{ date('d/m/Y h:i:s A', strtotime($v->tender_opening_date)) }}</td>
								<td> <a href="{{ route('admin.tender.edit', $v->id) }}"> Edit </td>
								<td> <a href="{{ route('admin.tender.delete', $v->id) }}" onclick="return confirm('Are you sure you want to delete this item? This action can not be undone');"> Delete </td>
								@if($v->tender_opening_date < date('Y-m-d')) <td> Expired </td> @endif
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="pagination">
					{!! $tenders->render() !!}
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

