@extends('layouts.app')

@section('content')

    <div class="pt-5 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
       
                    <div class="card-header font-semibold">Crear plan</div>

                                <form id="regForm" action="{{route('storePlan')}}" method="POST">
                                    @csrf
                                    
                                    <!-- One "tab" for each step in the form: -->
                                    <div class="tab">
                                        <h3>Crear plan</h3>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Nombre *</label>
                                                <input type="text" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Estado *</label>
                                                <select class="form-select col" aria-label="Default select example" name="plan"  oninput="this.className='form-select col'" required>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </p>
                                        <button type="button" onClick="location.href='{{route('dashboard')}}'" class="btn btn-outline-danger" aria-expanded="false">
                                            Cancelar
                                        </button>
                                    </div>

                                    <div class="tab">
                                        <h3>Prestaciones</h3>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Consultas médicas *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Consultas médicas domiciliarias *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Consulta médica online *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Internación *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Odontología general *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Ortodoncia *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Prótesis odontológicas *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Implantes odontológicos *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Kinesiología *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Psicología *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Medicamentos en farmacia *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Medicamentos en internación *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Óptica *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Cirugías estéticas *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Óptica *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Análisis clínicos *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Análisis de diagnóstico *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>

                                    </div>

                                    <div class="tab">
                                        <h3>Precios</h3>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Precio menores de 25 *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Precio de 25 a 40 *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Precio de 40 a 60 *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="row align-items-start">
                                                <label class="col">Precio mayores de 60 *</label>
                                                <input type="number" class="form-control col" id="floatingInput" name="name" oninput="this.className='form-control col'" required>
                                            </div>
                                        </p>

                                    </div>

                                    <div style="overflow:auto;">
                                        <div style="float:right;">
                                            <button class="btn btn-outline-primary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                            <button class="btn btn-outline-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Circles which indicates the steps of the form: -->
                                    <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                    </div>

                                </form>

                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('js/planMultiForm.js') }}" defer></script>

@endsection