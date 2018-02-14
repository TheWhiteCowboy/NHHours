@extends('layouts.login')
@section('content')
    <h1 style="text-align: center; font-weight: bold; color:#fff;" >Reset Wachtwoord</h1>
    {!! Form::open(['url' => route('password.email')]) !!}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="form-group">
        <div class="col-md-12">
            <div class="inner-addon right-addon">

                @if ($errors->has('email'))
                    <i class="fa fa-warning red login-warning"></i>
                @endif
                <input name="email" type="text" placeholder="E-mail" class="form-control login-input"></div>
        </div>
    </div>
    {{--<a href="#" class="btn btn-success btn-block waves-effect waves-light" style="margin-top: 20px;">Inloggen</a>--}}
    {!! Form::submit('Verzend wachtwoord reset link', ['class' => 'btn btn-success btn-block waves-effect waves-light', 'style' => 'margin-top: 10px;padding: 12px;font-size: 18px;']) !!}
    {!! Form::close() !!}
@endsection