@extends('layouts.app')

@section('content')

<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($way_to_pay=="Anual")
                <button type="button" class="btn btn-success" onclick="location.href='{{route('create_payment_coupon')}}'">Obtener cupon de pago</button>
            @elseif($way_to_pay=="Semestral")
                <button type="button" class="btn btn-success" onclick="location.href='{{route('create_payment_coupon')}}'">Obtener cupon de pago semestral</button>
            @elseif($way_to_pay=="Mensual")
                <form method="get" action="{{ route('create_payment_coupon_month') }}" enctype="multipart/form-data">
                        @csrf

                        <x-errors-alerts />

                        <div class="row align-items-start">
                            <p class="col">Mes del cupón</p>
                            <input type="number" class="col form-control" required name="month">
                        </div>

                        
                        <div class="post_button">
                            <button type="submit" class="btn btn-success">Obtener cupon de pago</button>
                        </div>
                    </form>
            @endif
        </div>
    </div>
</div>

@endsection