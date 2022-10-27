@extends('layouts.app')

@section('content')

<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-success" onclick="location.href='{{route('create_payment_coupon')}}'">Obtener cupon de pago</button>
        </div>
    </div>
</div>

@endsection