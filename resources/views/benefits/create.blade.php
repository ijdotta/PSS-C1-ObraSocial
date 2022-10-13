@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="card">
            <div class="card-header font-semibold"><strong>Solicitud de prestación</strong></div>
            <div class="card-body">

                <x-errors-alerts />

                {{ Form::open(['route' => ['benefits.store'], 'files' => 'true']) }}

                <div class="d-flex justify-content-center mb-3">
                    <em>Los campos solicitados con * son obligatorios</em>
                </div>
                
                <div class="form-group d-flex justify-content-center mx-5">
                    {{ Form::label('Nombre y apellido del profesional o establecimiento *') }}
                </div>

                <div class="form-group d-flex justify-content-center mx-5 mb-3">
                    {{ Form::text('provider', null, ['class' => 'form-control']) }}
                </div>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Fecha de realización *') }}</x-slot>
                    <x-slot:input>{{ Form::date('service_date', null, ['class' => 'form-control']) }}</x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Orden médica *') }}</x-slot>
                    <x-slot:input>{{ Form::file('medical_order', ['class' => 'form-control']) }}</x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Historia clínica') }}</x-slot>
                    <x-slot:input>{{ Form::file('medical_history', ['class' => 'form-control']) }}</x-slot>
                </x-forms.input>

                <x-buttons.submit-cancel-btns />

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
