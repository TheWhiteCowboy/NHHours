@extends('layouts.base')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>

        @if(Entrust::hasRole('admin'))
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="#" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Uren
                    toevoegen</a>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title counter-box">Uren deze maand<span
                            class="counter text-success">{{ $monthlyHours['hours'] }}</span>
                </h3>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title counter-box">Contract uren<span
                            class="counter text-purple">{{$user->contract_hours}}</span></h3>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title counter-box">Contract uren<span
                            class="counter text-purple">{{$user->contract_hours}}</span></h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="working-hours-filters">
                <div class="table-header">
                    {!! Form::open(['url' => '', 'id' => 'working-hours-filters']) !!}
                    <div class="col-md-3">
                        {{ Form::select('size', ['L' => 'januari', 'S' => 'februari'], null, ['class' => 'form-control select-user']) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Zoeken..']) }}
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success btn-block pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Filteren</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </form>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box" id="working-hours">
                @include('dashboard.load')
            </div>
        </div>
    </div>
@endsection