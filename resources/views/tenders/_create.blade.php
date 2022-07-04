<div class="form-group {{ $errors->has('tender_id') ? 'has-error' : ''}}">
  {!! Form::label('tender_id', 'ID *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('tender_id', $tender_id, ['class' => 'form-control required', 'id' => 'tender_id', 'placeholder' => 'Enter ID', 'readonly' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('tender_number') ? 'has-error' : ''}}">
  {!! Form::label('tender_number', 'Tender Number *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('tender_number', null, ['class' => 'form-control required', 'id' => 'tender_number', 'placeholder' => 'Tender Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name_of_the_work') ? 'has-error' : ''}}">
  {!! Form::label('name_of_the_work', 'Name of the Work*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::textarea('name_of_the_work', null, ['class' => 'form-control required', 'id' => 'name_of_the_work', 'placeholder' => 'Name of the Work', 'row' => 1, 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name_of_the_work', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('bid_type') ? 'has-error' : ''}}">
  {!! Form::label('bid_type', 'Type of Bid*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('bid_type', [''=>'Select', 'SingleStage'=>'Single Stage','TwoStage'=>'Two Stage'], null, array('class'=>'form-control required')) !!}
  </div>
  {!! $errors->first('bid_type', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('tender_class') ? 'has-error' : ''}}">
  {!! Form::label('tender_class', 'Class of Tender*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('tender_class', [''=>'Select', 'OpenTender'=>'Open Tender','LimitedTender'=>'Limited Tender','SingleTender'=>'Single Tender'], null, array('class'=>'form-control required')) !!}
  </div>
  {!! $errors->first('tender_class', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('tender_type') ? 'has-error' : ''}}">
  {!! Form::label('tender_type_id', 'Tender type *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::select('tender_type_id', $tender_types, null, ['class' => 'form-control required', 'id' => 'tender_type_id', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender_type_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('cost_of_work') ? 'has-error' : ''}}">
  {!! Form::label('cost_of_work', 'Estimated Cost of the Work *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::number('cost_of_work', null, ['class' => 'form-control required', 'id' => 'cost_of_work', 'placeholder' => 'Estimated Cost of the Work', "step" => "any", 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('cost_of_work', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('ernest_money_deposit') ? 'has-error' : ''}}">
  {!! Form::label('ernest_money_deposit', 'Earnest Money Deposit *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::number('ernest_money_deposit', null, ['class' => 'form-control required', 'id' => 'cost_of_work', 'placeholder' => 'Earnest Money Deposit', 'autocomplete' => 'off',"step" => "any", 'required' => 'true']) !!}
  </div>
  {!! $errors->first('ernest_money_deposit', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('cost_of_tender') ? 'has-error' : ''}}">
  {!! Form::label('cost_of_tender', 'Cost of Tender Document *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::number('cost_of_tender', null, ['class' => 'form-control required', 'id' => 'cost_of_work',"step" => "any", 'placeholder' => 'Cost of Tender Document', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('cost_of_tender', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('completion_period') ? 'has-error' : ''}}">
  {!! Form::label('completion_period', 'Completion Period *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-6">
    {!! Form::number('completion_period', null, ['class' => 'form-control required', 'id' => 'cost_of_work',"step" => "any", 'placeholder' => 'Completion Period', 'autocomplete' => 'off', 'required' => 'true']) !!} 
  </div>
  <div class="col-md-2">
    Days
  </div>
  {!! $errors->first('completion_period', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('validity_of_offer') ? 'has-error' : ''}}">
  {!! Form::label('validity_of_offer', 'Validity of Offer *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-6">
    {!! Form::number('validity_of_offer', null, ['class' => 'form-control required', 'id' => 'cost_of_work', 'placeholder' => 'Validity of Offer', 'autocomplete' => 'off', 'required' => 'true']) !!} 
  </div>
  <div class="col-md-2">
    Days
  </div>
  {!! $errors->first('validity_of_offer', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('issue_from') ? 'has-error' : ''}}">
  {!! Form::label('issue_from', 'Issue of Tender Documents from *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('issue_from', null, ['class' => 'datetimepicker form-control required', 'id' => 'name','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('issue_from', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('issue_from') ? 'has-error' : ''}}">
  {!! Form::label('issue_to', 'Issue of Tender Documents Upto *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('issue_to', null, ['class' => 'datetimepicker form-control required', 'id' => 'name','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('issue_to', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('receipt_of_offer') ? 'has-error' : ''}}">
  {!! Form::label('receipt_of_offer', 'Receipt of Offer *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('receipt_of_offer', null, ['class' => 'datetimepicker form-control required', 'id' => 'name','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('receipt_of_offer', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('receipt_of_offer') ? 'has-error' : ''}}">
  {!! Form::label('tender_opening_date', 'Tender opening Date *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-8">
    {!! Form::text('tender_opening_date', null, ['class' => 'datetimepicker form-control required', 'id' => 'name','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender_opening_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('receipt_of_offer') ? 'has-error' : ''}}">
  {!! Form::label('nit', 'Upload NIT *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::file('nit', null, ['class' => 'form-control required', 'id' => 'name','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('nit', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('receipt_of_offer') ? 'has-error' : ''}}">
  {!! Form::label('tender', 'Upload Tender *', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::file('tender', null, ['class' => 'form-control required', 'id' => 'name','autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender', '<span class="help-inline">:message</span>') !!}
</div>