@extends('layouts.app')

@section('content_header')
    <h1>Solicitud de reintegros</h1>
@stop

@section('content')

    <div class="container">
    <h3>Reintegros</h3><hr>
    @include('components.buttons.add', ['buttonText'=>'Solicitar reintegro','route' => 'reimbursements.create'])
    
    De aca para abajo lo hice solo para testear... se puede borrar.
    <table class="table">
      <thead>
        <tr>
          
          <th scope="col">Cuit/Cuil</th>
          <th scope="col">solicitud medica</th>
          <th scope="col">factura</th>
          <th scope="col">historia clinica</th>
          <th scope="col">comentario</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $reimbursement)
        <tr>
            <td>{{$reimbursement->cuit_cuil}}</td>
            <td>
                <img src="{{ url('public/Image/'.$reimbursement->medical_request->image) }}" style="height: 100px; width: 150px;">
            </td>
            <td>
                <embed src="{{ url('public/File/'.$reimbursement->invoice->image) }}" style="height: 100px; width: 150px;">
            </td>
            <td>
                <embed src="{{ url('public/File/'.$reimbursement->clinic_history->file) }}" style="height: 100px; width: 150px;">
            </td>
            <td>
                <a>{{$reimbursement->comment}}</a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection