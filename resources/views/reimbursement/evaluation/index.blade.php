@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="card">
            <div class="card-header font-semibold"><strong>Solicitudes de reintegro pendientes</strong></div>
            <div class="card-body">

                <x-errors-alerts />

                <table class="table table-hover">
                    <thead>
                        <th scope="col">Evaluar</th>
                        <th scope="col">DNI Afiliado</th>
                        <th scope="col">Fecha de solicitud</th>
                    </thead>
                    <tbody>
                        @foreach ($reimbursements as $reimbursement)
                            <tr>
                                <td>
                                    <a href="{{ route('evaluateReimbursement', $reimbursement->id) }}">
                                        <button class="btn btn-outline-primary">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>{{ $reimbursement->adult_affiliate->DNI }}</td>
                                <td>{{ $reimbursement->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
