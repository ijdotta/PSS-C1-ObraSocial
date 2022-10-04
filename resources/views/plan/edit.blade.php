@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                            <div class="card-body">                               
                                <div class="row align-items-center">
                                <h3 class="col">Editar el plan {{$plan->name}}</h3>
                                </div>
                                     <form class="form-floating mb-3" action="{{route('updatePlan',$plan)}}" method="POST">

                                        @csrf

                                            <div class="row align-items-start">
                                                <label class="col">Nombre </label>
                                                <input type="text" value={{$plan->name}} class="col" id="floatingInput" name="name" disabled>
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Estado </label>
                                                <select class="form-select col" aria-label="Default select example" name="state" oninput="this.className='form-select col'" required>
                                                    <option value={{$plan->state}} selected>{{$plan->state}}</option>
                                                    <option value='Nuevo'>Nuevo</option>
                                                    <option value='En_uso'>En_uso</option>
                                                    <option value='Caducado'>Caducado</option>
                                                </select>
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Fecha de creacion </label>
                                                <input type="date" value={{$plan->created_at}} class="col" id="floatingInput" name="created_at" disabled>
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Consultas medicas</label>
                                                <input type="number" value={{$plan->medical_consultations}} class="col" id="floatingInput" name="medical_consultations" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Consultas médicas domiciliarias</label>
                                                <input type="text" value={{$plan->home_medical_consultations}} class="col" id="floatingInput" name="home_medical_consultations" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Consulta médica online</label>
                                                <input type="number" value={{$plan->online_medical_consultations}} class="col" id="floatingInput" name="online_medical_consultations" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Internación</label>
                                                <input type="tenumberxt" value={{$plan->hospitalization}} class="col" id="floatingInput" name="hospitalization" >
                                            </div>

                                            <div class="row align-items-start">
                                                <label class="col">Odontología general</label>
                                                <input type="number" value={{$plan->general_odontology}} class="col" id="floatingInput" name="general_odontology" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Ortodoncia</label>
                                                <input type="number" value={{$plan->orthodontics}} class="col" id="floatingInput" name="orthodontics" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Prótesis odontológicas</label>
                                                <input type="number" value={{$plan->dental_prosthetics}} class="col" id="floatingInput" name="dental_prosthetics" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Implantes odontológicos</label>
                                                <input type="number" value={{$plan->dental_implants}} class="col" id="floatingInput" name="dental_implants" >
                                            </div>

                                            <div class="row align-items-start">
                                                <label class="col">Kinesiología</label>
                                                <input type="number" value={{$plan->kinesiology}} class="col" id="floatingInput" name="kinesiology" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Psicología</label>
                                                <input type="number" value={{$plan->psychology}} class="col" id="floatingInput" name="psychology" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Medicamentos en farmacia</label>
                                                <input type="number" value={{$plan->drugs_in_pharmacy}} class="col" id="floatingInput" name="drugs_in_pharmacy" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Medicamentos en internación</label>
                                                <input type="number" value={{$plan->medications_in_hospital}} class="col" id="floatingInput" name="medications_in_hospital" >
                                            </div>

                                            <div class="row align-items-start">
                                                <label class="col">Óptica</label>
                                                <input type="number" value={{$plan->optics}} class="col" id="floatingInput" name="optics" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Cirugías estéticas</label>
                                                <input type="number" value={{$plan->cosmetic_surgeries}} class="col" id="floatingInput" name="cosmetic_surgeries" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Análisis clínicos</label>
                                                <input type="number" value={{$plan->clinical_analysis}} class="col" id="floatingInput" name="clinical_analysis" >
                                            </div>
                                            <div class="row align-items-start">
                                                <label class="col">Análisis de diagnóstico</label>
                                                <input type="number" value={{$plan->diagnostic_analysis}} class="col" id="floatingInput" name="diagnostic_analysis" >
                                            </div>
                                            <div class="row align-items-start">
                                                    <label class="col">Precio menores de 25</label>
                                                    <input type="number" value={{$plan->price_under_25}} class="col" id="floatingInput" name="price_under_25" >
                                                </div>
                                                <div class="row align-items-start">
                                                    <label class="col">Precio de 25 a 40</label>
                                                    <input type="number" value={{$plan->price_from_25_to_40}} class="col" id="floatingInput" name="price_from_25_to_40" >
                                                </div>
                                                <div class="row align-items-start">
                                                    <label class="col">Precio de 40 a 60</label>
                                                    <input type="number" value={{$plan->price_from_40_to_60}} class="col" id="floatingInput" name="price_from_40_to_60" >
                                                </div>
                                                <div class="row align-items-start">
                                                    <label class="col">Precio mayores de 60</label>
                                                    <input type="number" value={{$plan->price_over_60}} class="col" id="floatingInput" name="price_over_60">
                                                </div>
                                        
                                        <div class="pt-2">
                                            <button type="submit" class="pe-2 btn btn-outline-success">confirmar</button>
                                            <button type="button" onClick="location.href='{{route('plans.index')}}'" class="btn btn-outline-danger" aria-expanded="false">
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