@extends('layouts.app')

@section('content')
<style>
@media print {
    #print {
        display: none;
    }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-heading">Tender Details</div>

                <div class="panel-body">
                    <div class="col-md-4">ID</div>
                    <div class="col-md-8">{{ $details->tender_id }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Department Name</div>
                    <div class="col-md-8">{{ $details->department['name'] }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Tender No.</div>
                    <div class="col-md-8">{{ strtoupper($details->tender_number) }}</div>
                </div>
                 <div class="panel-body">
                    <div class="col-md-4">Name of the Work</div>
                    <div class="col-md-8">{{ $details->name_of_the_work }}</div>
                </div>
                 <div class="panel-body">
                    <div class="col-md-4">Bid Type</div>
                    <div class="col-md-8">{{ $details->bid_type }}</div>
                </div>
                              <div class="panel-body">
                    <div class="col-md-4">Class of Tender</div>
                    <div class="col-md-8">{{ $details->tender_clas}}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Tender Type</div>
                    <div class="col-md-8">{{ $details->tender_type['name'] }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Estimated Cost of the Work</div>
                    <div class="col-md-8">{{ $details->cost_of_work }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Earnest Money Deposit</div>
                    <div class="col-md-8">{{ $details->ernest_money_deposit }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Cost of Tender Document</div>
                    <div class="col-md-8">{{ $details->cost_of_tender }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Completion Period</div>
                    <div class="col-md-8">{{ $details->completion_period }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Validity of Offer</div>
                    <div class="col-md-8">{{ $details->validity_of_offer }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Issue of Tender Documents From</div>
                    <div class="col-md-8">{{ date('d-m-Y h:i:s A', strtotime($details->issue_from)) }}</div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">Issue of Tender Documents Upto</div>
                    <div class="col-md-8">{{ date('d-m-Y h:i:s A', strtotime($details->issue_to)) }}</div>
                </div>

                <div class="panel-body">
                    <div class="col-md-4">Receipt of Offer</div>
                    <div class="col-md-8">{{ date('d-m-Y h:i:s A', strtotime($details->receipt_of_offer)) }}</div>
                </div>

                <div class="panel-body">
                    <div class="col-md-4">Tender opening Date</div>
                    <div class="col-md-8">{{ date('d-m-Y h:i:s A', strtotime($details->tender_opening_date)) }}</div>
                </div>
                

                <div id="print">
                <div class="panel-body">
                    <div class="col-md-4">Download</div>
                    <div class="col-md-1">
                        <a href="{{ asset($details->nit) }}">NIT</a>
                    </div>
                    <div class="col-md-1    ">
                     <a href="{{ asset($details->tender) }}">Tender</a> 
                     
                    </div>

                     <div class="col-md-10">
                        <a href="#" onclick="PrintElem('#print')" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print</a>
                    </div>

                    <div class="col-md-3">
                     @if($details->corrigendum != '') <a href="{{ asset($details->corrigendum) }}">Corrigendum</a> @endif
                    </div>
                </div>
                </div> <!--/print-->
            </div>
        </div>

       
    </div>
</div>
@endsection

@section('pageScript')
<script type="text/javascript">

    function PrintElem(elem)
    {
       window.print();//Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Tender</title>');
        /*optional stylesheet*/ 
        mywindow.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
@stop
