@extends('layouts.app')

@section('content')
<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-semibold"><strong>Agregar nuevo afiliado</strong></div>
                <div class="card-body">

                    <x-errors-alerts />

                    {{ Form::open(['route' => ['adult_affiliates.store']]) }}

                    <div class="form-group">
                        {{ Form::label('Nombre *') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Apellido *') }}
                        {{ Form::text('surname', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Fecha de nacimiento *') }}
                        {{ Form::date('birthdate', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('DNI *') }}
                        {{ Form::number('DNI', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Email *') }}
                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="card-body">

                        <p><strong>Dirección</strong></p>

                        <div class="form-group">
                            {{ Form::label('Calle') }}
                            {{ Form::text('street', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Número') }}
                            {{ Form::number('street_number', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Localidad *') }}
                            {{ Form::text('location', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Provincia *') }}
                            {{ Form::text('province', null, ['class' => 'form-control']) }}
                        </div>

                    </div>

                    <div class="form-group">
                        {{ Form::label('Teléfono *') }}
                        {{ Form::number('phone_number', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Plan seleccionado *') }}
                        {{ Form::select('plan_id', $planesEnUso, null, ['class' => 'form-select']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Forma de pago *') }}
                        {{ Form::select('way_to_pay', ['Mensual' => 'Mensual', 'Semestral' => 'Semestral', 'Anual' => 'Anual'], 'Mensual', ['class' => 'form-select']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Contraseña *') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}

                        {{ Form::label('Repita la contraseña *') }}
                        {{ Form::password('password_repeat', ['class' => 'form-control']) }}
                    </div>

                    <x-buttons.submit-cancel-btns />

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection