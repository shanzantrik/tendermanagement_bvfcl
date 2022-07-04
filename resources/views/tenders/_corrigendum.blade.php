<div class="form-group {{ $errors->has('tender_type') ? 'has-error' : ''}}">
  {!! Form::label('tender_id', 'Tender *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('tender_id', $tenders, null, ['class' => 'form-control required', 'id' => 'tender_id', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender_id', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('corrigendum') ? 'has-error' : ''}}">
  {!! Form::label('corrigendum', 'Upload Corrigendum', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::file('corrigendum', null, ['class' => 'form-control required', 'id' => 'name','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('corrigendum', '<span class="help-inline">:message</span>') !!}
</div>