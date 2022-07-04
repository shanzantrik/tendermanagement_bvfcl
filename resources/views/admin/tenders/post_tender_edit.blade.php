@extends('admin.layouts.default') 
@section('content')
<h3>Edit Post Tender</h3>

<div class="col-md-12">
  <div class="widget box">
    <div class="widget-content">
      {!! Form::model($post_tender, array('route' => ['admin.post_tender.update', $post_tender->id], 'id' => 'tender_store', 'class' => 'form-horizontal row-border', 'files' => true)) !!}

      @include('tenders._post_tender_create')
      
      <div class="form-group"><label class="col-md-4"></label><a href="{{ asset($post_tender->tender) }}"> Download Previous Tender </a></div>
      <div class="form-actions">
          <label class="col-md-4"></label>
          <div class="col-md-8">{!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}</div>
      </div>
      {!!form::close()!!}

    </div>
  </div>
</div>
@stop