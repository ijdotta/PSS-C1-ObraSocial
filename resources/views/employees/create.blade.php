@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-semibold"><strong>Crear un nuevo empleado</strong></div>
                    <div class="card-body">

                        <x-errors-alerts />

                        {{ Form::open(['route' => ['employees.store']]) }}

                        <div class="form-group">
                            {{ Form::label('Nombre') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Apellido') }}
                            {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Fecha de nacimiento') }}
                            {{ Form::date('date_of_birth', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('DNI') }}
                            {{ Form::number('DNI', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Email') }}
                            {{ Form::email('email', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Número de teléfono') }}
                            {{ Form::number('phone_number', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="card-body">

                            <p><strong>Dirección</strong></p>

                            <div class="form-group">
                                {{ Form::label('Calle') }}
                                {{ Form::text('street', null, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Número') }}
                                {{ Form::number('number', null, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Ciudad') }}
                                {{ Form::text('city', null, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Provincia') }}
                                {{ Form::text('province', null, ['class' => 'form-control']) }}
                            </div>

                        </div>
                        <div class="form-group">
                            {{ Form::label('Rol') }}
                            {{ Form::select('role', $roles, $default_role_id, ['class' => 'form-select'])}} 
                        </div>

                        <div class="form-group">
                            {{ Form::label('Contraseña') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}

                            {{ Form::label('Repita la contraseña') }}
                            {{ Form::password('password_repeat', ['class' => 'form-control']) }}
                        </div>

                        <x-buttons.submit-cancel-btns />

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
