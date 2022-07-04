<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('department_id', 'Department', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('department_id', $departments, $department_id, ['class' => 'form-control required', 'id' => 'tender_type_id',]) !!}
  </div>
</div>
<div class="form-group {{ $errors->has('tender_type') ? 'has-error' : ''}}">
  {!! Form::label('tender_type_id', 'Tender type', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('tender_type_id', $tender_types, $tender_type_id, ['class' => 'form-control required', 'id' => 'tender_type_id']) !!}
  </div>
</div>
