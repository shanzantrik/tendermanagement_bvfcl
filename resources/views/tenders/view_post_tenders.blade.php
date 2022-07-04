@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Summary of Post Tender</div>

                <div class="panel-body">
                    <div class="col-md-12">
                        {!! Form::open(array('route' => 'all_post_tenders', 'id' => 'all_post_tenders', 'method' => 'get', 'class' => 'form-horizontal row-border')) !!}

                        <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
                          {!! Form::label('department_id', '', array('class' => 'col-md-3 control-label')) !!}
                          <div class="col-md-4">
                            {!! Form::select('department_id', $departments, null, ['class' => 'form-control required', 'id' => 'department_id', 'placeholder' => 'Select Department']) !!}
                          </div>

                          <div class="col-md-4">{!! Form:: submit('Search', ['class' => 'btn btn-info']) !!}</div>

                          {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
                        </div>
                        {!!form::close()!!}

                        <div class="col-md-12">
                            <h2 style="text-decoration: underline;"> Results </h2>
                        </div>

                        @if(count($results))
                            <?php $count = 1; ?>
                            <table cellpadding="0" cellspacing="0" border="0" class="table" width="100%">
                                <thead>
                                    <th> Sl No </th>
                                    <th> Department </th>
                                    <th> Upload Date </th>
                                    <th> Month/Year </th>
                                    <th> Post Tender Details</th>
                                </thead>
                                <tbody>
                                    @foreach($results as $k => $v)
                                      <tr>
                                        <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                                        <td> {{$v->department['name']}}</td>
                                        <td> {{ date('d-m-Y', strtotime($v->upload_date)) }} </td>
                                        <td> {{ date('F y', strtotime($v->monthyear)) }} </td>
                                        <td> <a href="{{ asset($v->tender) }}">Download</a> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                              {!! $results->render() !!}
                            </div>
                        @else

                        <div class="alert alert-warning">
                          <strong>Oops !</strong> no Results Found !
                        </div>

                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
