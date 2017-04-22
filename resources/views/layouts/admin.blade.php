<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('/vendor/fontawesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('/vendor/metisMenu/dist/metisMenu.css')}}" />
    <link rel="stylesheet" href="{{asset('/vendor/animate.css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap/dist/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('/vendor/select2-3.5.2/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('/vendor/select2-bootstrap/select2-bootstrap.css')}}" />

    <link rel="stylesheet" href="{{asset('/vendor/summernote/dist/summernote.css')}}" />
    <link rel="stylesheet" href="{{asset('/vendor/summernote/dist/summernote-bs3.css')}}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('/fonts/pe-icon-7-stroke/css/helper.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style.c')}}ss">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker.min.c')}}ss">
    <link rel="stylesheet" href="{{asset('/js/sweetalert/lib/sweet-alert.c')}}ss">
    <link rel="stylesheet" href="{{asset('/js/toastr/build/toastr.min.c')}}ss">
    <link rel="stylesheet" href="{{asset('/css/custom.c')}}ss">

    <!-- Scripts -->
    <script>
        window.Laravel =<?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

</head>
<body class="fixed-navbar fixed-sidebar">

<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
            <span>{{ trans('admin.title') }}</span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">{{ trans('admin.home.title') }}</span>
        </div>



        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="">{{ trans('menu.my_profile') }}</a>
                    </li>
                    <li>
                        <a onclick="event.preventDefault(); document.getElementById('logout').submit();" class="" href="{{ route('logout') }}">{{ trans('menu.logout') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            @include('admin._navbar-right')
        </div>
    </nav>
</div>


<aside id="menu">
    @include('admin._side-menu')
</aside>

<div id="wrapper">
    @yield('content')
</div>

<!-- Right sidebar -->
<div id="right-sidebar" class="animated fadeInRight">

    <div class="p-m">
        <button id="sidebar-close" class="right-sidebar-toggle sidebar-button btn btn-default m-b-md"><i class="pe pe-7s-close"></i>
        </button>
        <div>
            <span class="font-bold no-margins"> Analytics </span>
            <br>
            <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.</small>
        </div>
        <div class="row m-t-sm m-b-sm">
            <div class="col-lg-6">
                <h3 class="no-margins font-extra-bold text-success">300,102</h3>

                <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
            </div>
            <div class="col-lg-6">
                <h3 class="no-margins font-extra-bold text-success">280,200</h3>

                <div class="font-bold">98% <i class="fa fa-level-up text-success"></i></div>
            </div>
        </div>
        <div class="progress m-t-xs full progress-small">
            <div style="width: 25%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" role="progressbar"
                 class=" progress-bar progress-bar-success">
                <span class="sr-only">35% Complete (success)</span>
            </div>
        </div>
    </div>
    <div class="p-m">
        <span class="font-bold no-margins"> Sales in last week </span>
        <div class="m-t-xs">
            <div class="row">
                <div class="col-xs-6">
                    <small>Today</small>
                    <h4 class="m-t-xs">$170,20 <i class="fa fa-level-up text-success"></i></h4>
                </div>
                <div class="col-xs-6">
                    <small>Last week</small>
                    <h4 class="m-t-xs">$580,90 <i class="fa fa-level-up text-success"></i></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <small>Today</small>
                    <h4 class="m-t-xs">$620,20 <i class="fa fa-level-up text-success"></i></h4>
                </div>
                <div class="col-xs-6">
                    <small>Last week</small>
                    <h4 class="m-t-xs">$140,70 <i class="fa fa-level-up text-success"></i></h4>
                </div>
            </div>
        </div>
        <small> Lorem Ipsum is simply dummy text of the printing simply all dummy text.
            Many desktop publishing packages and web page editors.
        </small>
    </div>

</div>

<form id="data-url" action="">
    {{ csrf_field() }}
</form>

<!-- Vendor scripts -->
<script src="{{asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('/vendor/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/vendor/jquery-flot/jquery.flot.js')}}"></script>
<script src="{{asset('/vendor/jquery-flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('/vendor/jquery-flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('/vendor/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('/vendor/jquery.flot.spline/index.js')}}"></script>
<script src="{{asset('/vendor/metisMenu/dist/metisMenu.min.js')}}"></script>
<script src="{{asset('/vendor/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('/vendor/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('/vendor/sparkline/index.js')}}"></script>
<script src="{{asset('/vendor/select2-3.5.2/select2.min.js')}}"></script>
<script src="{{asset('/vendor/summernote/dist/summernote.min.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('/js/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/js/jQuery-Mask-Plugin/src/jquery.mask.js')}}"></script>
<script src="{{asset('/js/bootstrap3-typeahead.js')}}"></script>
<script src="{{asset('/js/sweetalert/lib/sweet-alert.min.js')}}"></script>
<script src="{{asset('/js/toastr/build/toastr.min.js')}}"></script>
<script src="{{asset('/js/homer.js')}}"></script>


</body>
</html>



