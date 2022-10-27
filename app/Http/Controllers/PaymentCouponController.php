<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdultAffiliate;
use Illuminate\Support\Facades\Auth;
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
        $affiliate=AdultAffiliate::where('user_id','=',Auth::user()->id)->get()->first();
        return view('coupon.generatePaymentCoupon',compact('affiliate'));
    }

    public function request()
    {
        return view('coupon.requestPaymentCoupon');
    }

    public function downloadPDF()
    {
        $affiliate=AdultAffiliate::where('user_id','=',Auth::user()->id)->get()->first();

        $pdf = PDF::loadView('coupon.pdf',compact('affiliate'));

        return $pdf->download('coupon.pdf',compact('affiliate'));
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
