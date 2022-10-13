@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-semibold"><strong>Prestaciones</strong></div>
                    <div class="card-body">

                        <x-errors-alerts />

                        <div class="d-flex justify-content-center my-2">
                            <a href="{{ route('benefits.create') }}"><button class="btn btn-success">Solicitar prestación</button></a>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <th scope="col">Profesional o establecimiento</th>
                                <th scope="col">Fecha de solicitud</th>
                                <th scope="col">Fecha de estudio</th>
                                <th scope="col">Estado</th>
                            </thead>
                            <tbody>
                                @foreach ($benefits as $benefit)
                                    <tr>
                                        <td>{{ $benefit->provider }}</td>
                                        <td>{{ $benefit->created_at }}</td>
                                        <td>{{ $benefit->service_date }}</td>
                                        <td>{{ 'state' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
