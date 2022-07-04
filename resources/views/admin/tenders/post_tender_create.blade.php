@extends('admin.layouts.default') 
@section('content')


<div class="col-md-12">
<h3>Add New Post Tender</h3>
  <div class="widget box">
    <div class="widget-content">
      {!! Form::open(array('route' => 'admin.post_tender.store', 'id' => 'tender_store', 'class' => 'form-horizontal row-border', 'files' => true)) !!}
      <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
        {!! Form::label('department_id', 'Department *', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-8">
          {!! Form::select('department_id', $departments, null, ['class' => 'form-control required', 'id' => 'department_id', 'placeholder' => 'Select Department', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
      </div>
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
@stop