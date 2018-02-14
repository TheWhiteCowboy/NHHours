<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>NHHours</title>
    <!-- Bootstrap Core CSS -->
{{ HTML::style('bootstrap/dist/css/bootstrap.min.css') }}
<!-- Menu CSS -->
{{ HTML::style('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}
<!-- toast CSS -->
{{ HTML::style('plugins/bower_components/toast-master/css/jquery.toast.css') }}
<!-- morris CSS -->
{{ HTML::style('plugins/bower_components/morrisjs/morris.css') }}
<!-- chartist CSS -->
{{ HTML::style('plugins/bower_components/chartist-js/dist/chartist.min.css') }}
{{ HTML::style('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}
<!-- animation CSS -->
{{ HTML::style('css/animate.css') }}
<!-- Custom CSS -->
{{ HTML::style('css/custom.css') }}
{{ HTML::style('css/style.css') }}

<!-- color CSS -->
{{ HTML::style('css/colors/default.css') }}
{{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
{{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}

</head>

<body class="fix-header">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <a class="logo" href="index.html">
                    <img src="/images/logo.png" alt="home" style="width: 175px;margin-left: 22px;"/>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a class="profile-pic" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img"
                                                          width="36" class="img-circle"><b
                                class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->fullName()}}</b></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <ul class="nav" id="side-menu">
                <li style="padding: 70px 0 0;">
                    <a href="/" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/profile" class="waves-effect"><i class="fa fa-user fa-fw"
                                                               aria-hidden="true"></i>Profile</a>
                </li>
            </ul>
            <div class="center p-20">
                <a href="/logout" class="btn btn-danger btn-block waves-effect waves-light">Uitloggen</a>
            </div>
        </div>

    </div>
    <div id="page-wrapper">
        <div class="container-fluid">
        @yield('content')
        </div>
    </div>
</div>
{{ HTML::script('plugins/bower_components/jquery/dist/jquery.min.js') }}
<!-- Bootstrap Core JavaScript -->
{{ HTML::script('bootstrap/dist/js/bootstrap.min.js') }}
<!-- Menu Plugin JavaScript -->
{{ HTML::script('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}
<!--slimscroll JavaScript -->
{{ HTML::script('js/jquery.slimscroll.js') }}
<!--Wave Effects -->
{{ HTML::script('js/waves.js') }}
<!--Counter js -->
{{ HTML::script('plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}
{{ HTML::script('plugins/bower_components/counterup/jquery.counterup.min.js') }}
<!-- chartist chart -->
{{ HTML::script('plugins/bower_components/chartist-js/dist/chartist.min.js') }}
{{ HTML::script('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}
<!-- Sparkline chart JavaScript -->
{{ HTML::script('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}
<!-- Custom Theme JavaScript -->
{{ HTML::script('js/custom.min.js') }}
{{ HTML::script('js/dashboard1.js') }}
{{ HTML::script('plugins/bower_components/toast-master/js/jquery.toast.js') }}
{{ HTML::script('js/custom.js') }}
</body>

</html>
