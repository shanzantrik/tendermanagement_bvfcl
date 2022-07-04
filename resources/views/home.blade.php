@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Tender</div>

                <div class="panel-body">
                    <div class="col-md-8">
                        {!! Form::open(array('route' => 'tender.store', 'id' => 'tender_store', 'class' => 'form-horizontal row-border', 'files' => true)) !!}
                        <div class="form-group {{ $errors->has('tender_type') ? 'has-error' : ''}}">
                          {!! Form::label('department_id', 'Department *', array('class' => 'col-md-3 control-label')) !!}
                          <div class="col-md-8">
                            {!! Form::select('deptId', $departments, $department_id, ['class' => ' form-control required', 'id' => 'tender_type_id', 'disabled' => true, 'required' => 'true']) !!}
                          </div>
                          {!! $errors->first('tender_type_id', '<span class="help-inline">:message</span>') !!}
                        </div>

                        @include('tenders._create')
                        
                        {!! Form::hidden('department_id', $department_id) !!}
                        <div class="form-actions">
                            <label class="col-md-4"></label>
                            <div class="col-md-8">{!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}</div>
                        </div>
                        {!!form::close()!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
