@extends('layouts.app')

@section('content')

<div class="pt-5 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($way_to_pay=="Anual")
                <x-errors-alerts />
                <button type="button" class="btn btn-success" onclick="location.href='{{route('create_payment_coupon_annual')}}'">Obtener cupon de pago</button>
            @elseif($way_to_pay=="Semestral")
                <div class="row align-items-start">
                    <x-errors-alerts />
                    <button type="button" class="col btn btn-success" onclick="location.href='{{route('create_payment_coupon_semester',['semester'=>1])}}'">Obtener cupon de pago 1er semestre</button>
                    <button type="button" class="ms-3 col btn btn-success" onclick="location.href='{{route('create_payment_coupon_semester',['semester'=>2])}}'">Obtener cupon de pago 2do semestre</button>
                </div>
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