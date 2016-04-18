@extends('admin.layouts.default')

@section('content')
<!-- Breadcrumbs line -->
<div class="crumbs">
    <ul id="breadcrumbs" class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Dashboard</a>
        </li>
        <li class="current">
            <a href="pages_calendar.html" title="">Calendar</a>
        </li>
    </ul>

    <ul class="crumb-buttons">
        <li><a href="#" title=""><i class="fa fa-calendar-check-o"></i><span>5th February, 2016 8:44AM</span></a></li>
        
    </ul>
</div>
<!-- /Breadcrumbs line -->
<!--=== Page Header ===-->
<div class="page-header">
    <div class="page-title">
        <h3>Dashboard</h3>
        <span>Good morning, John!</span>
    </div>
</div>
<!-- /Page Header -->
<!--=== Page Content ===-->
<!--=== Statboxes ===-->
<div class="row row-bg"> <!-- .row-bg -->
    <div class="col-sm-6 col-md-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual cyan">
                    <div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
                </div>
                <div class="title">Clients</div>
                <div class="value">4 501</div>
                <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->

    <div class="col-sm-6 col-md-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual green">
                    <div class="statbox-sparkline">20,30,30,29,22,15,20,30,32</div>
                </div>
                <div class="title">Feedbacks</div>
                <div class="value">714</div>
                <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->

    <div class="col-sm-6 col-md-3 hidden-xs">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual yellow">
                    <i class="icon-dollar"></i>
                </div>
                <div class="title">Total Profit</div>
                <div class="value">$42,512.61</div>
                <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->

    <div class="col-sm-6 col-md-3 hidden-xs">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual red">
                    <i class="icon-user"></i>
                </div>
                <div class="title">Visitors</div>
                <div class="value">2 521 719</div>
                <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->
</div> <!-- /.row -->
<!-- /Statboxes -->
@endsection
