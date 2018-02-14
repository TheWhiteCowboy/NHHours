@extends('layouts.login')
@section('content')
    <h1 style="text-align: center; font-weight: bold; color:#fff;" >Login</h1>
    {!! Form::open(['url' => route('login')]) !!}

    <div class="form-group">
        <div class="col-md-12">
            <div class="inner-addon right-addon">

                @if ($errors->has('email'))
                    <i class="fa fa-warning red login-warning"></i>
                @endif
                <input type="text" name="email" placeholder="E-mail" class="form-control login-input"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <div class="inner-addon right-addon">
                @if ($errors->has('password'))
                    <i class="fa fa-warning red login-warning"></i>
                @endif
                <input type="password" name="password" placeholder="Wachtwoord" class="form-control login-input"
                       style="margin-top:30px;"></div>
        </div>
    </div>
    <a class="btn btn-link" style="float: right;" href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>
    {{--<a href="#" class="btn btn-success btn-block waves-effect waves-light" style="margin-top: 20px;">Inloggen</a>--}}
    {!! Form::submit('Inloggen', ['class' => 'btn btn-success btn-block waves-effect waves-light', 'style' => 'margin-top: 10px;padding: 12px;font-size: 18px;']) !!}
    {!! Form::close() !!}
@endsection
