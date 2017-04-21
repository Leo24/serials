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
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-speaker"></i>
                    </a>
                    <ul class="dropdown-menu hdropdown notification animated flipInX">
                        <li>
                            <a>
                                <span class="label label-success">NEW</span> It is a long established.
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="label label-warning">WAR</span> There are many variations.
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="label label-danger">ERR</span> Contrary to popular belief.
                            </a>
                        </li>
                        <li class="summary"><a href="#">See all notifications</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-keypad"></i>
                    </a>

                    <div class="dropdown-menu hdropdown bigmenu animated flipInX">
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="projects.html">
                                        <i class="pe pe-7s-portfolio text-info"></i>
                                        <h5>Projects</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="mailbox.html">
                                        <i class="pe pe-7s-mail text-warning"></i>
                                        <h5>Email</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="contacts.html">
                                        <i class="pe pe-7s-users text-success"></i>
                                        <h5>Contacts</h5>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="forum.html">
                                        <i class="pe pe-7s-comment text-info"></i>
                                        <h5>Forum</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="analytics.html">
                                        <i class="pe pe-7s-graph1 text-danger"></i>
                                        <h5>Analytics</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="file_manager.html">
                                        <i class="pe pe-7s-box1 text-success"></i>
                                        <h5>Files</h5>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu hdropdown animated flipInX">
                        <div class="title">
                            You have 4 new messages
                        </div>
                        <li>
                            <a>
                                It is a long established.
                            </a>
                        </li>
                        <li>
                            <a>
                                There are many variations.
                            </a>
                        </li>
                        <li>
                            <a>
                                Lorem Ipsum is simply dummy.
                            </a>
                        </li>
                        <li>
                            <a>
                                Contrary to popular belief.
                            </a>
                        </li>
                        <li class="summary"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="sidebar" class="right-sidebar-toggle">
                        <i class="pe-7s-upload pe-7s-news-paper"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="login.html">
                        <i class="pe-7s-upload pe-rotate-90"></i>
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
{{--<script src="{{asset('vendor/metisMenu/dist/metisMenu.min.js')}}"></script>--}}
<script src="{{asset('vendor/jquery-flot/jquery.flot.js')}}"></script>
<script src="{{asset('vendor/jquery-flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('vendor/jquery-flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('vendor/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('vendor/jquery.flot.spline/index.js')}}"></script>
<script src="{{asset('vendor/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('vendor/sparkline/index.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('js/homer.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
