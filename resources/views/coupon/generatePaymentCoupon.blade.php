@extends('layouts.app')

@section('content')

<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-success" onclick="location.href='{{route('download_payment_coupon')}}'">Descargar cupon de pago</button>
            Generar cupon de pago {{$affiliate->name}}
        </div>
    </div>
</div>

@endsection