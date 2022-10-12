@extends('layouts.app')

@section('content_header')
    <h1>Solicitud de reintegros</h1>
@stop

@section('content')

<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1>Solicitud de reintegro</h1>
                    <form method="post" action="{{ route('reimbursements.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row align-items-start">
                            <p class="col">Cuit/Cuil *</p>
                            <input type="number" class="col form-control" required name="cuit_cuil">
                        </div>

                        <div class="row align-items-start">
                            <p class="col">Solicitud medica *</p>
                            <input type="file" class="col form-control" accept="image/*" required name="image_medical_request">
                        </div>

                        <div class="row align-items-start">
                            <p class="col">Factura *</p>
                            <input type="file" class="col form-control" accept="image/*,application/pdf" required name="invoice">
                        </div>

                        <div class="post_button">
                        <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


@endsection