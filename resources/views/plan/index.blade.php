@extends('layouts.app')

@section('content_header')
<h1>Planes</h1>
@stop

@section('content')
<div class="pt-5 container">
    <div class="card">
        <div class="card-body">

            <x-errors-alerts />
            <div class="d-flex justify-content-center my-2">
                <a href="{{ route('plans.create') }}"><button class="btn btn-success">Agregar
                        Plan</button></a>
            </div>

            <table class="table table-hover">
                <thead>
                    <th scope="col">Acciones</th>
                    <th scope="col">Prestaciones</th>
                    <th scope="col">Precios</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha de creacion</th>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td class="d-flex justify-content-start">
                            <a class="btn btn-outline-primary" href="{{ route('plans.edit', $plan->id) }}">
                                <i class="fas fa-pen mx-1"></i>
                            </a>
                            {!! Form::open([
                            'method' => 'delete',
                            'route' => ['plans.destroy', $plan->id],
                            'style' => 'display:inline',
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash mx-1"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Prestaciones{{$plan->name}}" class="btn btn-outline-primary" aria-expanded="false">
                                <i class="fa fa-eye mx-1"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Precios{{$plan->name}}" class="btn btn-outline-primary" aria-expanded="false">
                                <i class="fa fa-eye mx-1"></i>
                            </button>
                        </td>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->state }}</td>
                        <td>{{ $plan->created_at }}</td>
                    </tr>
                    <!-- Modal Prestaciones-->
                    <div class="modal fade" id="Prestaciones{{$plan->name}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Prestaciones</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row align-items-start">
                                        <label class="col">Consultas medicas</label>
                                        <input type="text" value={{$plan->medical_consultations}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Consultas médicas domiciliarias</label>
                                        <input type="text" value={{$plan->home_medical_consultations}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Consulta médica online</label>
                                        <input type="text" value={{$plan->online_medical_consultations}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Internación</label>
                                        <input type="text" value={{$plan->hospitalization}} class="col" id="floatingInput" name="name" disabled>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Odontología general</label>
                                        <input type="text" value={{$plan->general_odontology}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Ortodoncia</label>
                                        <input type="text" value={{$plan->orthodontics}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Prótesis odontológicas</label>
                                        <input type="text" value={{$plan->dental_prosthetics}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Implantes odontológicos</label>
                                        <input type="text" value={{$plan->dental_implants}} class="col" id="floatingInput" name="name" disabled>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Kinesiología</label>
                                        <input type="text" value={{$plan->kinesiology}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Psicología</label>
                                        <input type="text" value={{$plan->psychology}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Medicamentos en farmacia</label>
                                        <input type="text" value={{$plan->drugs_in_pharmacy}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Medicamentos en internación</label>
                                        <input type="text" value={{$plan->medications_in_hospital}} class="col" id="floatingInput" name="name" disabled>
                                    </div>

                                    <div class="row align-items-start">
                                        <label class="col">Óptica</label>
                                        <input type="text" value={{$plan->optics}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Cirugías estéticas</label>
                                        <input type="text" value={{$plan->cosmetic_surgeries}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Análisis clínicos</label>
                                        <input type="text" value={{$plan->clinical_analysis}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Análisis de diagnóstico</label>
                                        <input type="text" value={{$plan->diagnostic_analysis}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal precios-->
                    <div class="modal fade" id="Precios{{$plan->name}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Precios</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row align-items-start">
                                        <label class="col">Precio menores de 25</label>
                                        <input type="text" value={{$plan->price_under_25}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Precio de 25 a 40</label>
                                        <input type="text" value={{$plan->price_from_25_to_40}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Precio de 40 a 60</label>
                                        <input type="text" value={{$plan->price_from_40_to_60}} class="col" id="floatingInput" name="name" disabled>
                                    </div>
                                    <div class="row align-items-start">
                                        <label class="col">Precio mayores de 60</label>
                                        <input type="text" value={{$plan->price_over_60}} class="col" id="floatingInput" name="name" disabled>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$plans->links()}}
            </div>
        </div>
    </div>
</div>


@endsection