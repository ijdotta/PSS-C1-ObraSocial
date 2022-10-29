@extends('layouts.app')

@section('content')

<div class="container py-5">
        <div class="row align-items-start">
            <p class="col">Forma de pago: {{ $affiliate->way_to_pay }}</p>
            <p class="col">Fecha de pago: {{ $payDate }}</p>
        </div>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Titular</td>
                    <td>{{ $affiliate->name }}</td>
                    <td>{{ $affiliate->surname }}</td>
                    <td>{{ $affiliate->DNI }}</td>
                </tr>
                @foreach ($affiliate->minorAffiliates as $minor)
                    <tr>
                        <td>Menor asociado</td>
                        <td>{{ $minor->name }}</td>
                        <td>{{ $minor->surname }}</td>
                        <td>{{ $minor->DNI }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row align-items-start">
            <p class="col">Monto total: ${{ $totalToPay }}</p>
            <p class="col">Fecha de vencimiento: {{ $expirationDate }}</p>
        </div>
    </div>


@endsection