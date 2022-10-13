@extends('layouts.app')

@section('content_header')
    <h1>Editar afiliado</h1>
@stop

@section('content')
    <div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card"> 
                            <div class="card-body">
                               <form class="form-floating mb-3" action="{{route('updateAffiliateSelf',$self)}}" method="POST">
                                    <p for="floatingInput">Los campos con * son obligatorios</p>
                                    @csrf

                                   <div class="row align-items-start">
                                        <label class="col">Nombre *</label>
                                        <input type="text" value="{{$self->name}}" class="form-control col" id="floatingInput" name="name" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Apellido *</label>
                                        <input type="text" value="{{$self->surname}}" class="form-control col" id="floatingInput" name="surname" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Fecha de nacimiento *</label>
                                        <input type="date" value="{{$self->birthdate}}" class="form-control col" id="floatingInput" name="birthdate" required>
                                    </div>

                                    <div div class="row align-items-start">
                                        <p class="col">DNI *</p>
                                        <input type="number" value="{{$self->DNI}}" class="form-control col" id="floatingInput" name="DNI" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <p class="col">email *</p>
                                        <input type="email" value="{{$self->email}}" class="form-control col" id="floatingInput" name="email" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <p class="col">Direccíon</p>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Calle</label>
                                        <input type="text" value="{{$self->street}}" class="form-control col" id="floatingInput" name="street">
                                        <label class="col">Número</label>
                                        <input type="number" value="{{$self->street_number}}" class="form-control col" id="floatingInput" name="street_number">

                                    </div>
                                   
                                    <div class="row align-items-start">
                                        <label class="col">Localidad *</label>
                                        <input type="text" value="{{$self->location}}" class="form-control col" id="floatingInput" name="location" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Proviencia *</label>
                                        <input type="text" value="{{$self->province}}" class="form-control col" id="floatingInput" name="province" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Telefono *</label>
                                        <input type="text" value="{{$self->phone_number}}" class="form-control col" id="floatingInput" name="phone_number" required>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Plan seleccionado *</label>
                                        <select class="form-select col" aria-label="Default select example" name="plan" required>
                                            @foreach ($planesEnUso as $plan)
                                                <option @if($plan->id == $self->plan_id) selected @endif value="{{$plan->id}}">{{$plan->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Forma de pago *</label>
                                        <select class="form-select col" aria-label="Default select example" name="way_to_pay" required>
                                            <option @if($self->way_to_pay == "Mensual") selected @endif value="Mensual">Mensual</option>
                                            <option @if($self->way_to_pay == "Semestral") selected  @endif value="Semestral">Semestral</option>
                                            <option @if($self->way_to_pay == "Anual") selected @endif value="Anual">Anual</option>
                                        </select>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Contraseña *</label>
                                        <input type="password" 
                                            @auth
                                            @if(Auth::user()->role!="AFFILIATE")
                                                disabled
                                            @endif
                                            @endauth 
                                                value={{$self->password}} class="form-control col" id="floatingInput" name="password" required>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end">
                                    <div class="pt-2">
                                        @include('components.buttons.confirm')
                                        @include('components.buttons.cancel-button')
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