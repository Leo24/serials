<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Serials</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />






    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}" />
    {{--<link rel="stylesheet" href="{{asset('vendor/metisMenu/dist/metisMenu.css')}}" />--}}
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/dist/css/bootstrap.css')}}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('fonts/pe-icon-7-stroke/css/helper.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">







    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>

<body class="hide-sidebar">
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            Serials
        </span>
    </div>
    <nav role="navigation">
        {{--<div class="header-link hide-menu"><i class="fa fa-bars"></i></div>--}}
        <div class="small-logo">
            <span class="text-primary">HOMER APP</span>
        </div>
        {{--<form role="search" class="navbar-form-custom" method="post" action="#">--}}
            {{--<div class="form-group">--}}
                {{--<input type="text" placeholder="Search something special" class="form-control" name="search">--}}
            {{--</div>--}}
        {{--</form>--}}
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">


                <li class="dropdown">
                    <a href="{{route('login')}}">
                        <button class="btn btn-info btn-sm">Log in</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>


    @yield('content')




<!-- Vendor scripts -->
<script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('vendor/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/jquery-flot/jquery.flot.js')}}"></script>
<script src="{{asset('vendor/jquery-flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('vendor/jquery-flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('vendor/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('vendor/jquery.flot.spline/index.js')}}"></script>
<script src="{{asset('vendor/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('vendor/sparkline/index.js')}}"></script>
<script src="{{asset('/js/masonry_4.2.0/masonry.pkgd.js')}}"></script>
{{--<script src="{{asset('/js/masonry_4.2.0/masonry.pkgd.min.js')}}"></script>--}}

<!-- App scripts -->
<script src="{{asset('js/site.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
