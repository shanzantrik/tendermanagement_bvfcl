<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Receptionist Name', array('class' => 'col-md-4 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Enter Receptionist name', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>
<br />

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
  {!! Form::label('email', 'Email ID', array('class' => 'col-md-4 control-label')) !!}
  <div class="col-md-8">
    {!! Form::email('email', null, ['class' => 'form-control required', 'id' => 'email', 'placeholder' => 'Enter email ID of the receptionist', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('email', '<span class="help-inline">:message</span>') !!}
</div>
<br />