@extends('layouts.app')

@section('content')
<div class="pt-5 container">
    <div class="card">
        <div class="card-header font-semibold"><strong>Empleados</strong></div>
        <div class="card-body">

            <x-errors-alerts />

            <div class="d-flex justify-content-center my-2">
                <a href="{{ route('employees.create') }}"><button class="btn btn-success">Agregar
                        empleado</button></a>
            </div>

            <table class="table table-hover">
                <thead>
                    <th scope="col">Acciones</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Rol</th>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td class="d-flex justify-content-start">
                            <a class="btn btn-outline-primary" href="{{ route('employees.edit', $employee->id) }}">
                                <i class="fas fa-pen mx-1"></i>
                            </a>
                            {!! Form::open([
                            'method' => 'delete',
                            'route' => ['employees.destroy', $employee->id],
                            'style' => 'display:inline',
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash mx-1"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->DNI }}</td>
                        <td>{{ $roles[$employee->role] }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$employees->links()}}
            </div>
        </div>
    </div>
</div>
@endsection