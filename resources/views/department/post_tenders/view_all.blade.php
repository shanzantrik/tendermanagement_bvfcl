@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
      <div class="col-md-9">
        <h3>Post Tenders</h3>
        <?php $count = 1; ?>
        @if(count($results))
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Tender Name</th>
                <th>Upload Date</th>
                <th> Month Year </th>
                <th>Download</th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $k => $v)
              <tr>
                <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                <td> {{$v->name}}</td>
                <td> {{$v->upload_date}}</td>
                <td> {{ date('F y', strtotime($v->monthyear)) }}</td>
                <td> <a href="{{ asset($v->tender) }}">Download</a> </td>
                <td> <a href="{{ route('department.post_tender.edit', Crypt::encrypt($v->id)) }}">EDIT</a> | 
                    <a href="{{ route('department.post_tender.remove', Crypt::encrypt($v->id)) }}" onclick="return confirm('Are you sure you want to delete this item? This action can not be undone');">Remove</a>
                </td>
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

