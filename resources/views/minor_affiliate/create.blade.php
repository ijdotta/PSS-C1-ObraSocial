@extends('layouts.app')

@section('content_header')
    <h1>Agregar nuevo menor de edad</h1>
    <h1><?= $jajas ?></h1>
@stop

@section('content')
<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form class="form-floating mb-3" action="{{route('minor_affiliates.store')}}" method="POST">

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
                            <label class="col">Telefono *</label>
                            <input type="text" class="form-control col" id="floatingInput" name="phoneNumber" required>
                        </div>

                        <div class="row align-items-start">
                            <label class="col">ID Mayor responsable * (SOLO ADMIN)</label>
                            <input type="number" class="form-control col" id="floatingInput" name="adultAffiliateID" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="pt-2">
                            @include('components.buttons.confirm')
                            @include('components.buttons.cancel', ['route' => 'minor_affiliates.index'])
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