@extends('layouts.app')

@section('content')
<div class="pt-5 container">
    <div class="card">
        <div class="card-header font-semibold"><strong>Menores afiliados a mi plan</strong></div>
        <div class="card-body">

            <x-errors-alerts />

            <div class="d-flex justify-content-center my-2">
                <a href="{{ route('minor_affiliates.create') }}"><button class="btn btn-success">Agregar
                        menor de edad</button></a>
            </div>

            <table class="table table-hover">
                <thead>
                    <th scope="col">Acciones</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Telefono</th>
                </thead>
                <tbody>
                    @foreach ($minorAffiliates as $minorAffiliate)
                    <tr>
                        <td class="d-flex justify-content-start">
                            <a class="btn btn-outline-primary" href="{{ route('minor_affiliates.edit', $minorAffiliate->id) }}">
                                <i class="fas fa-pen mx-1"></i>
                            </a>
                            {!! Form::open([
                            'method' => 'delete',
                            'route' => ['minor_affiliates.destroy', $minorAffiliate->id],
                            'style' => 'display:inline',
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash mx-1"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>{{ $minorAffiliate->name }}</td>
                        <td>{{ $minorAffiliate->surname }}</td>
                        <td>{{ $minorAffiliate->birthdate }}</td>
                        <td>{{ $minorAffiliate->DNI }}</td>
                        <td>{{ $minorAffiliate->phone_number }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$minorAffiliates->links()}}
            </div>
        </div>
    </div>
</div>
@endsection