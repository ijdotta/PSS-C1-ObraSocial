@extends('layouts.app')

@section('content_header')
    <h1>Solicitud de reintegros</h1>
@stop

@section('content')

    <div class="container">
    <h3>View all image</h3><hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Cuit/Cuil</th>
          <th scope="col">solicitud medica</th>
          <th scope="col">factura</th>
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
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection