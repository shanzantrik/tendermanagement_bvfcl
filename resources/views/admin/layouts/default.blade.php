<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Dashboard | BVFCL Application</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->

	<link href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

	<!-- jQuery UI -->
	<!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
	<![endif]-->

	<!-- Theme -->
	
	<link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome/font-awesome.min.css') }}">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<link href=" {{ asset('assets/css/jquery.datetimepicker.css') }}" rel="stylesheet">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" rel="stylesheet">
	<!--=== JavaScript ===-->

	<script type="text/javascript" src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/libs/lodash.compat.min.js') }}"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="{{ asset('plugins/touchpunch/jquery.ui.touch-punch.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/event.swipe/jquery.event.move.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/event.swipe/jquery.event.swipe.js') }}"></script>

	<!-- General -->
	<script type="text/javascript" src="{{ asset('assets/js/libs/breakpoints.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/respond/respond.min.js') }}"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="{{ asset('plugins/cookie/jquery.cookie.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/slimscroll/jquery.slimscroll.horizontal.min.js') }}"></script>

	<!-- Page specific plugins -->
	<!-- Charts -->
	<!--[if lt IE 9]>
		<script type="text/javascript" src="plugins/flot/excanvas.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.time.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.growraf.min.js') }}"></script>
	<script type="text/javascript" src="plugins/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('plugins/daterangepicker/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>

	<!-- Noty -->
	<script type="text/javascript" src="{{ asset('plugins/noty/jquery.noty.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/noty/layouts/top.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/noty/themes/default.js') }}"></script>

	<!-- Forms -->
	<script type="text/javascript" src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/select2/select2.min.js') }}"></script>

	<!-- App -->
	<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins.form-components.js') }}"></script>

	<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
	<script src=" {{ asset('assets/js/jquery.datetimepicker.js') }}"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<style>
		input[type="password"] {	
			padding: 10px;
			border: 1px solid #D8D8D8;
		}
	</style>
	@yield('pageCss')
	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins

		$('.timepicker').datetimepicker({format:'h:i A', datepicker:false, step:10});
        $('.datepicker').datetimepicker({format:'d-m-Y', timepicker:false});
        $('.datetimepicker').datetimepicker({format:'d-m-Y h:i A'});

        $('.monthyear').datepicker( {
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                onClose: function(dateText, inst) { 
                function isDonePressed(){
                                return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                            }

                            if (isDonePressed()){

                                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                $(this).datepicker('setDate', new Date(year, month, 1));
                                 console.log('Done is pressed')

                            }
                }
            });
	});
	</script>

</head>
<body>
	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		@include('admin.common.header')
	</header> <!-- /.header -->

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
		@include('admin.common.sidebar')
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<div class="col-md-10">
	                @if(Session::has('message'))
	                <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
	                    <button type="button" class="close" data-dismiss="alert">×</button>
	                    {!! Session::get('message') !!}
	                </div>
	                @endif
	            </div>
				@yield('content')
			</div>
			<!-- /.container -->
		</div>
	</div>
</body>
</html>