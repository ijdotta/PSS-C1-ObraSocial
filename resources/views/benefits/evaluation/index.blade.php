@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="card">
            <div class="card-header font-semibold"><strong>Prestaciones pendientes</strong></div>
            <div class="card-body">

                <x-errors-alerts />

                <table class="table table-hover">
                    <thead>
                        <th scope="col">Evaluar</th>
                        <th scope="col">Profesional o establecimiento</th>
                        <th scope="col">Fecha de solicitud</th>
                        <th scope="col">Fecha de estudio</th>
                        <th scope="col">Estado</th>
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
                                <td>{{ $benefit->provider }}</td>
                                <td>{{ $benefit->created_at }}</td>
                                <td>{{ $benefit->service_date }}</td>
                                <td>{{ $benefitStates[$benefit->state] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
