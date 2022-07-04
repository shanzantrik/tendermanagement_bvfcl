@extends('admin.layouts.default') 
@section('content')
<h3>Add New Tender</h3>

<div class="col-md-12">
  <div class="widget box">
    <div class="widget-content">
      {!! Form::open(array('route' => 'admin.tender.store', 'id' => 'tender_store', 'class' => 'form-horizontal row-border', 'files' => true)) !!}
      <div class="form-group {{ $errors->has('tender_type') ? 'has-error' : ''}}">
        {!! Form::label('department_id', 'Department *', array('class' => 'col-md-3 control-label')) !!}
        <div class="col-md-8">
          {!! Form::select('department_id', $departments, null, ['class' => ' form-control required', 'id' => 'tender_type_id', 'required' => 'true']) !!}
        </div>
        {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
      </div>

      @include('tenders._create')
      
      <div class="form-actions">
          <label class="col-md-4"></label>
          <div class="col-md-8">{!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}</div>
      </div>
      {!!form::close()!!}

      
    </div>
  </div>
</div>
@stop