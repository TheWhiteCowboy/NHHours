<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>NHHours</title>
    {{ HTML::style('bootstrap/dist/css/bootstrap.min.css') }}
    {{ HTML::style('css/style.css') }}
    <style>
        #login{
            height: 100%;
        }

        .login-background{
            background: url('/images/login.jpg');

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            -webkit-filter: blur(20px);
            filter: blur(20px);
        }

        .overlay{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: .5;
            z-index: 1;
        }

        .login-screen {
            display: inline-block;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 400px;
            height: 450px;
            margin: auto;
            z-index: 2;
        }

        .login-input{
            border-radius: 12px;
            font-size: 18px;
            padding: 24px;
        }
        /* enable absolute positioning */
        .inner-addon {
            position: relative;
        }

        .inner-addon .login-warning {
            position: absolute;
            padding: 10px;
            pointer-events: none;
        }

        .right-addon .login-warning {
            right: 10px;
            top: 5px;
            font-size: 20px;
            color: red;
        }

        .right-addon input { padding-right: 30px; }
    </style>
</head>
<body id="login">
<div class="login-background" ></div>
<div class="overlay"></div>
<div class="login-screen">
    @yield('content')
</div>
</body>

</html>