@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-semibold"><strong>Modifica menor de edad</strong></div>
                    <div class="card-body">

                        <x-errors-alerts />

                        {{-- {{ Form::open(['route' => ['minor_affiliates.store']]) }} --}}
                        {{ Form::model($minor_affiliates, ['method' => 'PUT', 'route' => ['minor_affiliates.update', $minor_affiliates]]) }}

                        <div class="form-group">
                            {{ Form::label('Nombre *') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Apellido *') }}
                            {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Fecha de nacimiento *') }}
                            {{ Form::date('date_of_birth', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('DNI *') }}
                            {{ Form::number('DNI', null, ['class' => 'form-control']) }}
                        </div>

                    
                        <div class="form-group">
                            {{ Form::label('Teléfono') }}
                            {{ Form::number('phone_number', null, ['class' => 'form-control']) }}
                        </div>
                        <x-buttons.submit-cancel-btns />

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
