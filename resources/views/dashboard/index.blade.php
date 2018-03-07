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
                    @if(Entrust::hasRole('admin'))
                    <div class="col-md-3">
                        {{ Form::select('user', $userOptions, null, ['class' => 'form-control', 'id' => 'select-user']) }}
                    </div>
                    @endif
                    <div class="col-md-3">
                        {{ Form::select('month', ['' => 'Geen maand', '1' => 'januari', '2' => 'februari', '3' => 'maart', '4' => 'april', '5' => 'mei', '6' => 'juni', '7' => 'juli', '8' => 'augustus', '9' => 'september', '10' => 'oktober', '11' => 'november', '12' => 'december'], null, ['class' => 'form-control', 'id' => 'select-month']) }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::select('year', ['' => 'Geen jaar', '2018' => '2018', '2019' => '2019'], null, ['class' => 'form-control', 'id' => 'select-year']) }}
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