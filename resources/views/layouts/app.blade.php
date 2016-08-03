<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--title>@yield('title', 'Home')</title-->
    <title>@yield('title', 'Home') | USOIL2APP</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- DataTable Bootstrap -->
    <!-- <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.1/css/bootstrap-toggle.min.css">
    
    <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
    
</head>
<body id="app-layout">

@if (Auth::guest())
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    USSOIL2APP
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@else
    <div id="wrapper" class="">
        <!-- Sidebar -->
           @include('layouts.sidebar')
        <!-- /#sidebar-wrapper -->
        <header class="header" style="display:none;">
            <a href="#menu-toggle"
               style="margin-top: 8px;margin-left: 5px;background-color: #E7E7E7;border-color: #E7E7E7"
               class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </header>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
    @if (Auth::guest())
    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- /#page-content-wrapper -->

    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/jquery.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/bootstrap.min.js"></script>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.1/js/bootstrap-toggle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

    <script>

        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

    @yield('scripts')

</body>
</html>
