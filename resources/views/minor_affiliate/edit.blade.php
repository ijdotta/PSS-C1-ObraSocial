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
                        {{ Form::model($minor_affiliates, ['method' => 'PUT', 'route' => ['minor_affiliates.update', $minor_affiliates->id]]) }}
                        
                        {{ Form::hidden('id', null, ['class' => 'form-control']) }}

                        <div class="form-group">
                            @auth
                            @if(Auth::user()->role!="AFFILIATE")
                                {{ Form::label('Nombre *') }}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            @else
                                {{ Form::label('Nombre *') }}
                                {{ Form::text('name', null, ['class' => 'form-control', 'disabled']) }}
                            @endif
                            @endauth 
                        </div>

                        <div class="form-group">
                            @auth
                            @if(Auth::user()->role!="AFFILIATE")
                                {{ Form::label('Apellido *') }}
                                {{ Form::text('surname', null, ['class' => 'form-control']) }}
                            @else
                                {{ Form::label('Apellido *') }}
                                {{ Form::text('surname', null, ['class' => 'form-control', 'disabled']) }}
                            @endif
                            @endauth 
                        </div>

                        <div class="form-group">
                            {{ Form::label('Fecha de nacimiento *') }}
                            {{ Form::date('birthdate', null, ['class' => 'form-control', 'disabled']) }}
                        </div>

                        <div class="form-group">
                            @auth
                            @if(Auth::user()->role!="AFFILIATE")
                                {{ Form::label('DNI *') }}
                                {{ Form::number('DNI', null, ['class' => 'form-control']) }}
                            @else
                                {{ Form::label('DNI *') }}
                                {{ Form::number('DNI', null, ['class' => 'form-control', 'disabled']) }}
                            @endif
                            @endauth 
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
