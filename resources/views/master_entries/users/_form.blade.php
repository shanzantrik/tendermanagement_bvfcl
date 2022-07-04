<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('department_id', 'Department', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('department_id', $departments ,null, ['class' => 'form-control required', 'id' => 'department_id','required' => 'true']) !!}
  </div>
  {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Enter name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
  {!! Form::label('username', 'Username', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('username', null, ['class' => 'form-control required', 'id' => 'username', 'placeholder' => 'Choose a username', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('username', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
  {!! Form::label('password', 'Password', array('class' => 'col-md-2 control-label')) !!}
  <div class="col-md-8">
    {!! Form::password('password', null, ['class' => 'form-control required', 'id' => 'password', 'placeholder' => 'Choose a password', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('password', '<span class="help-inline">:message</span>') !!}
</div>