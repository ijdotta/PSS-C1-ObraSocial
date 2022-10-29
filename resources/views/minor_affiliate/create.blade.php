@extends('layouts.app')

@section('content')
<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-semibold"><strong>Agregar nuevo menor de edad</strong></div>
                <div class="card-body">

                    <x-errors-alerts />

                    {{ Form::open(['route' => ['minor_affiliates.store']]) }}

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
                        {{ Form::label('Telefono *') }}
                        {{ Form::number('phoneNumber', null, ['class' => 'form-control']) }}
                    </div>

                    @can('link_minor_to_other_than_themselves')
                    <div class="form-group">
                        {{ Form::label('Id Mayor responsable * (SOLO ADMIN)') }}
                        {{ Form::number('adultAffiliateID', null, ['class' => 'form-control']) }}
                    </div>
                    @endcan



                    <x-buttons.submit-cancel-btns />

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection