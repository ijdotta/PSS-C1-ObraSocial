@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="card">
            <div class="card-header font-semibold"><strong>Solicitudes de prestación pendientes</strong></div>
            <div class="card-body">

                <x-errors-alerts />

                <table class="table table-hover">
                    <thead>
                        <th scope="col">Evaluar</th>
                        <th scope="col">DNI Afiliado</th>
                        <th scope="col">Fecha de solicitud</th>
                    </thead>
                    <tbody>
                        @foreach ($benefits as $benefit)
                            <tr>
                                <td>
                                    <a href="{{ route('evaluateBenefit', $benefit->id) }}">
                                        <button class="btn btn-outline-primary">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>{{ $benefit->adult_affiliate->DNI }}</td>
                                <td>{{ $benefit->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
