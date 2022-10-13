@extends('layouts.app')

@section('content')
<div class="pt-5 container">
    <div class="card">
        <div class="card-header font-semibold"><strong>Afiliados</strong></div>
        <div class="card-body">

            <x-errors-alerts />

            <div class="d-flex justify-content-center my-2">
                <a href="{{ route('adult_affiliates.create') }}"><button class="btn btn-success">Agregar
                        afiliado</button></a>
            </div>
            
            <table class="table table-hover">
                <thead>
                    <th scope="col">Acciones</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Plan seleccionado</th>
                    <th scope="col">Forma de pago</th>
                </thead>
                <tbody>
                    @foreach ($adultAffiliates as $adultAffiliate)
                    <tr>
                        <td class="d-flex justify-content-start">
                            <a class="btn btn-outline-primary" href="{{ route('adult_affiliates.edit', $adultAffiliate->id) }}">
                                <i class="fas fa-pen mx-1"></i>
                            </a>
                            {!! Form::open([
                            'method' => 'delete',
                            'route' => ['adult_affiliates.destroy', $adultAffiliate->id],
                            'style' => 'display:inline',
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash mx-1"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>{{ $adultAffiliate->name }}</td>
                        <td>{{ $adultAffiliate->surname }}</td>
                        <td>{{ $adultAffiliate->DNI }}</td>
                        <td>{{ $adultAffiliate->plan->name }}</td>
                        <td>{{ $adultAffiliate->way_to_pay }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$adultAffiliates->links()}}
            </div>
        </div>
    </div>
</div>
@endsection