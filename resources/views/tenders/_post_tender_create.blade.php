<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Tender Name *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Tender Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('upload_date') ? 'has-error' : ''}}">
  {!! Form::label('upload_date', 'Upload Date *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('upload_date', null, ['class' => 'datepicker form-control required', 'id' => 'upload_date','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('upload_date', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('upload_date') ? 'has-error' : ''}}">
  {!! Form::label('monthyear', 'Month/Year *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('monthyear', null, ['class' => 'monthyear form-control required', 'id' => 'monthyear','autocomplete' => 'off', 'value' => "02/2012", 'required' => 'true']) !!}
  </div>
  {!! $errors->first('monthyear', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('receipt_of_offer') ? 'has-error' : ''}}">
  {!! Form::label('tender', 'Upload Tender *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::file('tender', null, ['class' => 'form-control required', 'id' => 'name','autocomplete' => 'off',  'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender', '<span class="help-inline">:message</span>') !!}
</div>

@section('pageCss')
<style>
  .ui-datepicker-calendar {
    display: none;
    }
</style>
@stop