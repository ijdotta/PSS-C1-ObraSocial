@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="card">
            <div class="card-header font-semibold"><strong>Evaluar solicitud de prestación</strong></div>
            <div class="card-body">

                <x-errors-alerts />

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Nombre del profesional o establecimiento') }}</x-slot>
                        <x-slot:input>
                            {{ Form::text('provider', $benefit->provider, ['class' => 'form-control', 'disabled' => 'true']) }}
                            </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Fecha de solicitud') }}</x-slot>
                    <x-slot:input>{{ Form::date('created_at', $benefit->created_at, ['class' => 'form-control', 'disabled' => 'true']) }}</x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Fecha de realización') }}</x-slot>
                        <x-slot:input>
                            {{ Form::date('service_date', $benefit->service_date, ['class' => 'form-control', 'disabled' => 'true']) }}
                            </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Orden médica') }}</x-slot>
                        <x-slot:input>
                            <a href="{{ route('downloadMedicalOrder', $benefit->id) }}">
                                <button class="btn btn-outline-primary">
                                    <i class="fa-solid fa-image"></i>
                                </button>
                            </a>
                        </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Historia clínica') }}</x-slot>
                        <x-slot:input>
                            <a href="{{ route('downloadMedicalHistory', $benefit->id) }}">
                                <button class="btn btn-outline-primary">
                                    <i class="fa-solid fa-file-arrow-down"></i>
                                </button>
                            </a>
                        </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Comentario') }}</x-slot>
                        <x-slot:input>
                            {{ Form::textarea('comment', $benefit->comment, ['class' => 'form-control', 'disabled' => 'true']) }}
                            </x-slot>
                </x-forms.input>

                <div class="d-flex justify-content-center gap-5">
                    <div>
                        {{ Form::open(['method' => 'PUT', 'route' => ['rejectBenefit', $benefit->id]]) }}
                        {{ Form::button('<i class="fa-solid fa-ban"></i> Desaprobar', ['type' => 'submit', 'class' => 'form-control btn-outline-danger']) }}
                        {{ Form::close() }}
                    </div>
                    <div>
                        {{ Form::open(['method' => 'PUT', 'route' => ['approveBenefit', $benefit->id]]) }}
                        {{ Form::button('<i class="fa-solid fa-check"></i> Aprobar', ['type' => 'submit', 'class' => 'form-control btn-outline-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
