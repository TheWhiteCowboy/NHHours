@extends('layouts.base')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Afdelingen</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-department">
                Afdeling toevoegen
            </button>
            {{--<a href="" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm">Afdeling toevoegen</a>--}}
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Aantal personen</th>
                    </tr>
                    </thead>
                    <tbody id="working-hours-table">
                    @forelse($departments as $department)
                        <tr>
                            <td>{{$department->name}}</td>
                            <td>20</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Geen resultaten</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
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
                {!! Form::open(['url' => '', 'class' => 'form-horizontal form-material', 'id' => 'add-department', 'data-identity' => 3]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-12">Naam van de afdeling<span class="text-danger"
                                                                           id="name-error"></span></label>
                        <div class="col-md-12">
                            {{ Form::text('name', '', ['class' => 'form-control form-control-line', 'placeholder' => 'Naam']) }}
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