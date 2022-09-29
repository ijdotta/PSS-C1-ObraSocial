@extends('layouts.app')

@section('content')

    <div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
       
                        <div class="card-header font-semibold">Formulario dar de alta afiliado</div>

                            <div class="card-body">
                               <form class="form-floating mb-3" action="{{route('addAdultAffiliate')}}" method="POST">

                                    @csrf

                                   <div class="form-floating mb-3">
                                        <label for="floatingInput">Nombre</label>
                                        <input type="text" class="form-control" id="floatingInput" name="name" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Apellido</label>
                                        <input type="text" class="form-control" id="floatingInput" name="surname" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="floatingInput" name="dateBirth" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">DNI</label>
                                        <input type="number" class="form-control" id="floatingInput" name="DNI" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">email</label>
                                        <input type="email" class="form-control" id="floatingInput" name="email" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Direccíon</label>
                                        <input type="text" class="form-control" id="floatingInput" name="adress" required>
                                    </div>
                                   
                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Teléfono</label>
                                        <input type="number" class="form-control" id="floatingInput" name="phone" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Plan seleccionado</label>
                                        <select class="form-select" aria-label="Default select example" name="plan" required>
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Forma de pago</label>
                                        <select class="form-select" aria-label="Default select example" name="wayToPay" required>
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Contraseña</label>
                                        <input type="password" class="form-control" id="floatingInput" name="phone" required>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <label for="floatingInput">Repetir contraseña</label>
                                        <input type="password" class="form-control" id="floatingInput" name="phone" required>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                    <div class="pt-2">
                                        <button type="submit" class="pe-2 btn btn-outline-success">Submit</button>
                                        <button type="button" onClick="location.href='{{route('addAdultAffiliate')}}'" class="btn btn-outline-danger" aria-expanded="false">
                                            Cancel
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