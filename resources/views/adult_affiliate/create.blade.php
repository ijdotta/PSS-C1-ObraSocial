@extends('layouts.app')

@section('content_header')
    <h1>Agregar nuevo afiliado</h1>
@stop

@section('content')
    <div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card"> 
                            <div class="card-body">
                               <form class="form-floating mb-3" action="{{route('adult_affiliates.store')}}" method="POST">

                                    @csrf

                                   <p for="floatingInput">Los campos con * son obligatorios</p>

                                   <div class="row align-items-start">
                                        <label class="col">Nombre *</label>
                                        <input type="text" class="form-control col" id="floatingInput" name="name" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Apellido *</label>
                                        <input type="text" class="form-control col" id="floatingInput" name="surname" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Fecha de nacimiento *</label>
                                        <input type="date" class="form-control col" id="floatingInput" name="birthdate" required>
                                    </div>

                                    <div div class="row align-items-start">
                                        <p class="col">DNI *</p>
                                        <input type="number" class="form-control col" id="floatingInput" name="DNI" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <p class="col">email *</p>
                                        <input type="email" class="form-control col" id="floatingInput" name="email" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <p class="col">Direccíon</p>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Calle</label>
                                        <input type="text" class="form-control col" id="floatingInput" name="street">
                                        <label class="col">Número</label>
                                        <input type="number" class="form-control col" id="floatingInput" name="streetNumber">

                                    </div>
                                   
                                    <div class="row align-items-start">
                                        <label class="col">Localidad *</label>
                                        <input type="text" class="form-control col" id="floatingInput" name="location" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Proviencia *</label>
                                        <input type="text" class="form-control col" id="floatingInput" name="province" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Telefono *</label>
                                        <input type="text" class="form-control col" id="floatingInput" name="phoneNumber" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Plan seleccionado *</label>
                                        <select class="form-select col" aria-label="Default select example" name="plan" required>
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Forma de pago *</label>
                                        <select class="form-select col" aria-label="Default select example" name="wayToPay" required>
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Contraseña *</label>
                                        <input type="password" class="form-control col" id="floatingInput" name="password" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Repetir contraseña *</label>
                                        <input type="password" class="form-control col" id="floatingInput" name="passwordConfirmation" required>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                    <div class="pt-2">
                                        @include('components.buttons.confirm')
                                        @include('components.buttons.cancel', ['route' => 'adult_affiliates.index'])
                                    </div>
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