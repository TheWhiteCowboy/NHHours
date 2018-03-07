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
    {{ HTML::style('bootstrap/dist/css/bootstrap.min.css') }}
    {{ HTML::style('css/custom.css') }}
    {{ HTML::style('css/jquery.toast.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/colors/default.css') }}

</head>

<body class="fix-header">
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
                                class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->full_name}}</b></a>
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
                    <a href="{{route('dashboard.index')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{route('user.index')}}" class="waves-effect"><i class="fa fa-user fa-fw"
                                                               aria-hidden="true"></i>Profile</a>
                </li>
                <li>
                    <a href="{{route('department.index')}}" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Afdelingen</a>
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
{{ HTML::script('bootstrap/dist/js/bootstrap.min.js') }}
{{ HTML::script('js/jquery.toast.js') }}
{{ HTML::script('js/dashboard.js') }}
{{ HTML::script('js/user.js') }}
{{ HTML::script('js/department.js') }}

</body>

</html>
