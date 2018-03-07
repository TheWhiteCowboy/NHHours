@extends('layouts.base')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Profiel</h4>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['url' => '', 'class' => 'form-horizontal form-material','id' => 'user-profile', 'data-identity' => $user->id]) !!}
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
                <div class="user-bg"><img width="100%" alt="user" src="/images/natural-high.jpg">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg"
                                                              class="thumb-lg img-circle" alt="img"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white-box">
                <h3>Afdelingen</h3>
                @foreach($departments as $department)
                    {{ Form::checkbox('departments[]', $department->id, null, ['class' => 'department-checkbox']) }} {{$department->name}}
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
                <div class="form-group">
                    <label class="col-md-12">Naam<span class="text-danger" id="full_name-error"></span></label>
                    <div class="col-md-12">
                        {{ Form::text('full_name', $user->full_name, ['class' => 'form-control form-control-line', 'placeholder' => 'Naam']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">E-mail<span class="text-danger" id="email-error"></span></label>
                    <div class="col-md-12">
                        {{ Form::text('email', $user->email, ['class' => 'form-control form-control-line', 'placeholder' => 'E-mail']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Tefeloonnummer<span class="text-danger" id="phone-error"></span></label>
                    <div class="col-md-12">
                        {{ Form::text('phone', $user->phone, ['class' => 'form-control form-control-line', 'placeholder' => 'Telefoonnummer']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Geboortedatum<span class="text-danger" id="birth-error"></span></label>
                    <div class="col-md-12">
                        {{ Form::date('birth_date', $user->birth_date, ['class' => 'form-control form-control-line', 'placeholder' => 'Geboortedatum']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Uren contract (leeg laten indien 0 uren)</label>
                    <div class="col-md-12">
                        {{ Form::number('contract_hours', $user->contract_hours, ['class' => 'form-control form-control-line', 'placeholder' => 'Contract uren']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection