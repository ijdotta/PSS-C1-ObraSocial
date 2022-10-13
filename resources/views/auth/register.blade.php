<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sanar</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <body>
<div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card"> 
                            <div class="card-body">
                               <form class="form-floating mb-3" action="{{route('storeRegistro')}}" method="POST">

                               <x-errors-alerts />
                               
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
                                        <input type="number" class="form-control col" id="floatingInput" name="street_number">

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
                                        <input type="text" class="form-control col" id="floatingInput" name="phone_number" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Plan seleccionado *</label>
                                        <select class="form-select col" aria-label="Default select example" name="plan_id" required>
                                            @foreach ($planesEnUso as $plan)
                                                <option selected value={{$plan->id}}>{{$plan->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Forma de pago *</label>
                                        <select class="form-select col" aria-label="Default select example" name="way_to_pay" required>
                                            <option selected value="Mensual">Mensual</option>
                                            <option value="Semestral">Semestral</option>
                                            <option value="Anual">Anual</option>
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Contraseña *</label>
                                        <input type="password" class="form-control col" id="floatingInput" name="password" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Repetir contraseña *</label>
                                        <input type="password" class="form-control col" id="floatingInput" name="password_repeat" required>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                    <div class="pt-2">
                                        @include('components.buttons.confirm')
                                        @include('components.buttons.cancel', ['route' => 'welcome'])
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
</body>
</html>