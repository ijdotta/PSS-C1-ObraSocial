@extends('layouts.app')

@section('content_header')
    <h1>Menores afiliados a mi plan</h1>
@stop

@section('content')
    @include('components.buttons.add', ['route' => 'minor_affiliates.create'])
    <table id="productos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col" class="esconder-modo-celular">Apellido</th>
                <th scope="col" class="esconder-modo-celular">Fecha de nacimiento</th>
                <th scope="col">DNI</th>
                <th scope="col" class="esconder-modo-celular">Teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($minorAffiliates as $minorAffiliate)
            <tr>
                <td class="">{{$minorAffiliate->name}}</td>
                <td class="">{{$minorAffiliate->surname}}</td>
                <td class="">{{$minorAffiliate->birthdate}}</td>
                <td class="">{{$minorAffiliate->DNI}}</td>
                <td class="">{{$minorAffiliate->phone_number}}</td>
                <td class="text-center">
                @include('components.buttons.edit', ['element' => $minorAffiliate, 'route' => 'minor_affiliates.edit'])
                @include('components.buttons.delete', ['element' => $minorAffiliate, 'route' => 'minor_affiliates.destroy'])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop