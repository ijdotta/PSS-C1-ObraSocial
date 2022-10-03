@extends('layouts.app')

@section('content_header')
    <h1>Afiliados</h1>
@stop

@section('content')
    
    @include('components.buttons.add', ['route' => 'adult_affiliates.create', 'buttonText' => 'Agregar afiliado'])
    <table id="productos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col" class="esconder-modo-celular">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col" class="esconder-modo-celular">Plan seleccionado</th>
                <th scope="col">Forma de pago</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adultAffiliates as $adultAffiliate)
            <tr>
                <td class="">{{$adultAffiliate->name}}</td>
                <td class="">{{$adultAffiliate->surname}}</td>
                <td class="">{{$adultAffiliate->DNI}}</td>
                <td class="">{{$adultAffiliate->selectedPlan->name}}</td>
                <td class="">{{$adultAffiliate->way_to_pay}}</td>
                <td class="text-center">
                @include('components.buttons.edit', ['element' => $adultAffiliate, 'route' => 'adult_affiliates.edit'])
                @include('components.buttons.delete', ['element' => $adultAffiliate, 'route' => 'adult_affiliates.destroy'])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop