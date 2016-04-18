<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arunachal Pradesh</title>

    <!-- Fonts -->

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/jquery.datetimepicker.css') }}" rel="stylesheet">
    
    <style>
        body {
            font-family: Consolas,monaco,monospace;
            font-style: normal;
            font-variant: normal;
            font-weight: 500;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    @yield('page_css_libraries')
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Arunachal Pradesh
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Create New Appointment</a></li>
                    <li><a href="{{ route('appointment.index') }}">List of Appointments</a></li>
                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-md-10">
        <div class="content">
            @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {!! Session::get('message') !!}
            </div>
            @endif
        </div>
    </div>
    @yield('content')

    <!-- JavaScripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.datetimepicker.js') }}"></script>
    
    <script>
        $(document).ready(function(){
            $('.timepicker').datetimepicker({format:'h:i A', datepicker:false, step:10});
            $('.datepicker').datetimepicker({format:'d-m-Y', timepicker:false});
        });
    </script>

    @yield('page_js_libraries')
</body>
</html>
