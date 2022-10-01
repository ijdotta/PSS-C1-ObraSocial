@extends('layouts.app')

@section('content')

    <div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
       
                        <div class="card-header font-semibold">Formulario dar de alta afiliado</div>

                            <div class="card-body">
                               <form class="form-floating mb-3" action="{{route('addMinorAffiliate')}}" method="POST">

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
                                        <input type="date" class="form-control col" id="floatingInput" name="dateBirth" required>
                                    </div>

                                    <div div class="row align-items-start">
                                        <p class="col">DNI *</p>
                                        <input type="number" class="form-control col" id="floatingInput" name="DNI" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Telefono *</label>
                                        <input type="text" class="form-control col" id="floatingInput" name="phone" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">ID Mayor responsable *</label>
                                        <input type="number" class="form-control col" id="floatingInput" name="adultAffiliateID" required>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                    <div class="pt-2">
                                        <button type="submit" class="pe-2 btn btn-outline-success">Confirmar</button>
                                        <button type="button" onClick="location.href='{{route('dashboard')}}'" class="btn btn-outline-danger" aria-expanded="false">
                                            Cancelar
                                        </button>
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
