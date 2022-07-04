@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search Tender</div>

                <div class="panel-body">
                    <div class="col-md-10">
                        {!! Form::open(array('route' => 'tender.search_result', 'id' => 'tender_store', 'method' => 'get', 'class' => 'form-horizontal row-border', 'files' => true)) !!}

                        @include('tenders._tender_search_form')
                        
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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Recent Tenders</div>

                <div class="panel-body">
                    <div class="col-md-12">
                        @if($results)
                            <?php $count = 1; ?>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>ID</th> -->
                                        <th>Department</th>
                                        <th>Tender No.</th>
                                        <th>Tender Type</th>
                                        <th>Name of the Work</th>
                                        <th>Issue of Tender Documents from</th>
                                        <th>Issue of Tender Documents upto</th>
                                        <th>View</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($results as $k => $v)
                                    <tr class="gradeX">
                                        <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }}  </td>
                                        <!-- <td>{{ $v->tender_id }}</td> -->
                                        <td>{{ $v->department['name'] }}</td>
                                        <td>{{ $v->tender_number }}</td>
                                        <td>{{ $v->tender_type['name'] }}</td>
                                        <td>{{ $v->name_of_the_work }}</td>
                                        <td>{{ date('d-m-Y h:i:s A', strtotime($v->issue_from)) }}</td>
                                        <td>{{ date('d-m-Y h:i:s A', strtotime($v->issue_to)) }}</td>
                                        <td><a href="{{ route('tender.details', $v->id) }}"> View Details</a></td>
                                        <td> <a href="{{ asset($v->nit) }}">NIT</a> <br> <a href="{{ asset($v->tender) }}">Tender</a> @if($v->corrigendum != '') <br> <a href="{{ asset($v->corrigendum) }}">Corrigendum</a> @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination">
                                {!! $results->render() !!}
                            </div>
                        @else

                        <div class="alert alert-warning">
                          <strong>Oops !</strong> No recent Tenders Found !
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
