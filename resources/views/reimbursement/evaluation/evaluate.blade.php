@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="card">
            <div class="card-header font-semibold"><strong>Evaluar solicitud de reintegro</strong></div>
            <div class="card-body">

                <x-errors-alerts />

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Solicitante') }}</x-slot>
                        <x-slot:input>
                            {{ Form::text('provider', $reimbursement->adult_affiliate->lastname.', '.$reimbursement->adult_affiliate->name, ['class' => 'form-control', 'disabled' => 'true']) }}
                            </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('CUIT/CUIL') }}</x-slot>
                        <x-slot:input>
                            {{ Form::text('provider', $reimbursement->cuit_cuil, ['class' => 'form-control', 'disabled' => 'true']) }}
                            </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Fecha de solicitud') }}</x-slot>
                    <x-slot:input>{{ Form::date('created_at', $reimbursement->created_at, ['class' => 'form-control', 'disabled' => 'true']) }}</x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Fecha de realización') }}</x-slot>
                        <x-slot:input>
                            {{ Form::date('service_date', $reimbursement->service_date, ['class' => 'form-control', 'disabled' => 'true']) }}
                            </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Solicitud médica') }}</x-slot>
                        <x-slot:input>
                            <a href="{{ route('downloadReimbursementMedicalRequest', $reimbursement->id) }}">
                                <button class="btn btn-outline-primary">
                                    <i class="fa-solid fa-image"></i>
                                </button>
                            </a>
                        </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Factura') }}</x-slot>
                        <x-slot:input>
                            <a href="{{ route('downloadReimbursementInvoice', $reimbursement->id) }}">
                                <button class="btn btn-outline-primary">
                                    <i class="fa-solid fa-image"></i>
                                </button>
                            </a>
                        </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Historia clínica') }}</x-slot>
                        <x-slot:input>
                            <a href="{{ route('downloadReimbursementMedicalHistory', $reimbursement->id) }}">
                                <button class="btn btn-outline-primary">
                                    <i class="fa-solid fa-file-arrow-down"></i>
                                </button>
                            </a>
                        </x-slot>
                </x-forms.input>

                <x-forms.input>
                    <x-slot:label>{{ Form::label('Comentario') }}</x-slot>
                        <x-slot:input>
                            {{ Form::textarea('comment', $reimbursement->comment, ['class' => 'form-control', 'disabled' => 'true']) }}
                            </x-slot>
                </x-forms.input>

                <div class="d-flex justify-content-center gap-5">
                    <div>
                        {{ Form::open(['method' => 'PUT', 'route' => ['rejectReimbursement', $reimbursement->id]]) }}
                        {{ Form::button('<i class="fa-solid fa-ban"></i> Desaprobar', ['type' => 'submit', 'class' => 'form-control btn-outline-danger']) }}
                        {{ Form::close() }}
                    </div>
                    <div>
                        {{ Form::open(['method' => 'PUT', 'route' => ['approveReimbursement', $reimbursement->id]]) }}
                        {{ Form::button('<i class="fa-solid fa-check"></i> Aprobar', ['type' => 'submit', 'class' => 'form-control btn-outline-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
