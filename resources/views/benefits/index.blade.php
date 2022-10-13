@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="card">
            <div class="card-header font-semibold"><strong>Prestaciones</strong></div>
            <div class="card-body">

                <x-errors-alerts />

                <div class="d-flex justify-content-center my-2">
                    <a href="{{ route('benefits.create') }}"><button class="btn btn-success">Solicitar prestación</button></a>
                </div>

                {{Form::open(['route' => ['filteredBenefits']])}}
                <div class="row justify-content-between align-items-end border border-2 rounded rounded-5 p-2 m-3 gap-3">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            {{Form::label('from')}}
                            {{Form::date('from', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            {{Form::label('to')}}
                            {{Form::date('to', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <x-buttons.submit-button/>
                    </div>
                </div>
                    {{Form::close()}}

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
                                <td>{{ $benefitStates[$benefit->state] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
