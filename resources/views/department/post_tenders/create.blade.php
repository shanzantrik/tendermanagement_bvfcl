@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="widget box">
        <div class="widget-header">
          <h3>Add Post Tender</h3>
        </div>
        <div class="widget-content">
          {!! Form::open(array('route' => 'department.post_tender.submit', 'id' => 'tender_store', 'class' => 'form-horizontal row-border', 'files' => true)) !!}

          @include('tenders._post_tender_create')
          
          <div class="form-actions">
              <label class="col-md-4"></label>
              <div class="col-md-8">{!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}</div>
          </div>
          {!!form::close()!!}

        </div>
        <a href="{{ route('all_post_tenders') }}"> View All Post tenders </a>
      </div>
    </div>
  </div>
</div>
@stop