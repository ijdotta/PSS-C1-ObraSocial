@extends('layouts.app')

@section('content_header')
    <h1>Editar empleado</h1>
@stop

@section('content')
    <div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card"> 
                            <div class="card-header font-semibold"><strong>Editar usuario</strong></div>
                            <div class="card-body">
                               <form class="form-floating mb-3" action="{{route('updateEmployee',$self)}}" method="POST">
                                    <p for="floatingInput">Los campos con * son obligatorios</p>
                                    @csrf
                                    
                                    {{-- {{ Form::open(['route' => ['employees.store']]) }} --}}
                                    {{ Form::model($employee, ['method' => 'PUT', 'route' => ['employees.update', $employee->id]]) }}
                                    <div class="row align-items-start">
                                        <label class="col">Nombre *</label>
                                        {{ Form::text('name', null, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Apellido *</label>
                                        {{ Form::text('lastname', null, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Fecha de nacimiento *</label>
                                        {{ Form::date('date_of_birth', null, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">DNI *</label>
                                        {{ Form::number('DNI', null, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Email *</label>
                                        {{ Form::email('email', null, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Teléfono *</label>
                                        {{ Form::number('phone_number', null, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="card-body">

                                        <p><strong>Dirección</strong></p>

                                        <div class="row align-items-start">
                                            <label class="col">Calle</label>
                                            {{ Form::text('street', $employee->address->street, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                        </div>

                                        <div class="row align-items-start">
                                            <label class="col">Número</label>
                                            {{ Form::number('number', $employee->address->number, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                        </div>

                                        <div class="row align-items-start">
                                            <label class="col">Localidad *</label>
                                            {{ Form::text('city', $employee->address->city, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                        </div>

                                        <div class="row align-items-start">
                                            <label class="col">Provincia *</label>
                                            {{ Form::text('province', $employee->address->province, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                        </div>

                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Rol *</label>
                                        {{ Form::select('role', $roles, null, ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Contraseña *</label>
                                        {{ Form::password('password', ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Repita la contraseña *</label>
                                        {{ Form::password('password_repeat', ['class' => 'form-control col', 'readonly' => 'true']) }}
                                    </div>

                                    <div class="d-flex justify-content-end">
                                    <div class="pt-2">
                                        @include('components.buttons.edit', ['element' => $self, 'route' => 'myUserEmployeeEdit','buttonText'=>'Editar empleado'])
                                    </div>
                                    {{ Form::close() }}
                                </div>
                                </form>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection