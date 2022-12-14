@extends('layouts.app')

@section('content_header')
    <h1>Editar afiliado</h1>
@stop

@section('content')
    <div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card"> 
                        <div class="card-header font-semibold"><strong>Editar afiliado</strong></div>
                            <div class="card-body">
                               <form class="form-floating mb-3" action="{{route('updateAffiliate',$adultAffiliate)}}" method="POST">
                                    <p for="floatingInput">Los campos con * son obligatorios</p>
                                    @csrf

                                   <div class="row align-items-start">
                                        <label class="">Nombre *</label>
                                        <input type="text" value="{{$adultAffiliate->name}}" class="form-control col" id="floatingInput" name="name" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="">Apellido *</label>
                                        <input type="text" value="{{$adultAffiliate->surname}}" class="form-control col" id="floatingInput" name="surname" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="">Fecha de nacimiento *</label>
                                        <input type="date" value="{{$adultAffiliate->birthdate}}" class="form-control col" id="floatingInput" name="birthdate" required>
                                    </div>

                                    <div div class="row align-items-start">
                                        <p class="col">DNI *</p>
                                        <input type="number" value="{{$adultAffiliate->DNI}}" class="form-control col" id="floatingInput" name="DNI" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <p class="col">email *</p>
                                        <input type="email" value="{{$adultAffiliate->email}}" class="form-control col" id="floatingInput" name="email" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <a href="{{route('edit_adult_minors', $adultAffiliate->id)}}"class="pe-2 btn btn-primary">Modificar menores asociados</a>
                                    </div>

                                    <div class="card-body">

                                        <p><strong>Direcci??n</strong></p>

                                        <div class="form-group">
                                            <label class="">Calle</label>
                                            <input type="text" value="{{$adultAffiliate->street}}" class="form-control col" id="floatingInput" name="street">
                                        </div>

                                        <div class="form-group">
                                            <label class="">N??mero</label>
                                            <input type="number" value="{{$adultAffiliate->street_number}}" class="form-control col" id="floatingInput" name="street_number">
                                        </div>

                                        <div class="form-group">
                                            <label class="">Localidad *</label>
                                            <input type="text" value="{{$adultAffiliate->location}}" class="form-control col" id="floatingInput" name="location" required>    
                                        </div>

                                        <div class="form-group">
                                            <label class="">Proviencia *</label>
                                            <input type="text" value="{{$adultAffiliate->province}}" class="form-control col" id="floatingInput" name="province" required>      
                                        </div>

                                    </div>

                                    <div class="row align-items-start">
                                        <label class="">Telefono *</label>
                                        <input type="text" value="{{$adultAffiliate->phone_number}}" class="form-control col" id="floatingInput" name="phone_number" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="">Plan seleccionado *</label>
                                        <select class="form-select " aria-label="Default select example" name="plan" required>
                                            @foreach ($planesEnUso as $plan)
                                                <option @if($plan->id == $adultAffiliate->plan_id) selected @endif value="{{$plan->id}}">{{$plan->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="">Forma de pago *</label>
                                        <select class="form-select " aria-label="Default select example" name="way_to_pay" required>
                                            <option @if($adultAffiliate->way_to_pay == "Mensual") selected @endif value="Mensual">Mensual</option>
                                            <option @if($adultAffiliate->way_to_pay == "Semestral") selected  @endif value="Semestral">Semestral</option>
                                            <option @if($adultAffiliate->way_to_pay == "Anual") selected @endif value="Anual">Anual</option>
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="">Contrase??a *</label>
                                        <input type="password" class="form-control col" 
                                            @auth
                                            @if(Auth::user()->role!="AFFILIATE")
                                                disabled
                                            @endif
                                            @endauth 
                                                value={{$adultAffiliate->password}} class="form-control col" id="floatingInput" name="password" required>
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