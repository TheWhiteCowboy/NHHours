@extends('layouts.base')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>

        @if(Entrust::hasRole('admin'))
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button type="button" class="btn btn-success pull-right" data-toggle="modal"
                        data-target="#add-department">
                    Uren toevoegen
                </button>
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


    <div class="modal fade" id="add-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Afdeling toevoegen</h4>
                </div>
                {!! Form::open(['url' => '', 'class' => 'form-horizontal form-material', 'id' => 'add-department', 'data-identity' => \Illuminate\Support\Facades\Auth::user()->company_id]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12">Naam van de afdeling<span class="text-danger"
                                                                           id="name-error"></span></label>
                        <div class="col-md-4">
                            {{ Form::time('name', '', ['class' => 'form-control form-control-line', 'placeholder' => 'Naam']) }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::time('name', '', ['class' => 'form-control form-control-line', 'placeholder' => 'Naam']) }}
                        </div>
                        <div class="col-md-4">
                            {{ Form::time('name', '', ['class' => 'form-control form-control-line', 'placeholder' => 'Naam']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::date('name', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control form-control-line', 'placeholder' => 'Naam']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                    {{ Form::submit('Opslaan', ['class' => 'btn btn-success']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection