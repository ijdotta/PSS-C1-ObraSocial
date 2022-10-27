<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PaymentCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupon.generatePaymentCoupon');
    }

    public function request()
    {
        return view('coupon.requestPaymentCoupon');
    }

    public function downloadPDF()
    {

        $pdf = PDF::loadView('coupon.pdf');

        return $pdf->download('coupon.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    

   


}
