<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\AdultAffiliate;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;

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

    public function createMonth(Request $request)
    {
        $request->validate(   
            ['month' => 'required|integer|between:1,12'],
            [
                'month.between' => 'El cupón no está disponible, comuníquese con la obra social',
            ]
        );

        $requestedMonth=$request->month;
        $currentMonth=Carbon::now()->month;
        $currentDay=Carbon::now()->day;
        $expirationDate=Carbon::now();

        if($currentMonth==$requestedMonth){
            if($currentDay>=1 && $currentDay<=10){
                $expirationDate=Carbon::create(Carbon::now()->year, Carbon::now()->month, 10);
            }
        }

        if($currentMonth<$requestedMonth){
            $expirationDate=Carbon::create(Carbon::now()->year, $requestedMonth, 10);  
        }

        $daysInterest = Carbon::create(Carbon::now()->year, $requestedMonth, 10)->diffInDays(Carbon::now());
        if($currentMonth<$requestedMonth){
            $daysInterest = 0;  
        }

        if($currentMonth==$requestedMonth){
            if($currentDay>=1 && $currentDay<=10){
                $daysInterest = 0;
            }
        }

        $affiliate=AdultAffiliate::where('user_id','=',Auth::user()->id)->get()->first();
        $expirationDate=$expirationDate->format('Y-m-d');

        
        $totalToPay=PaymentCouponController::computeTotalToPay($daysInterest);
        
        $payDate=$requestedMonth;

        $pdf = PDF::loadView('coupon.pdf',compact('affiliate','expirationDate','payDate','totalToPay'));
        return $pdf->download('coupon.pdf',compact('affiliate','expirationDate','payDate','totalToPay'));
        //return view('coupon.generatePaymentCoupon',compact('affiliate','expirationDate','payDate','totalToPay'));
    }

    public function createSemester($semester)
    {
 
        $currentMonth=Carbon::now()->month;
        $currentDay=Carbon::now()->day;

        $checkDate = Carbon::now()->between(Carbon::create(Carbon::now()->year,1, 1), Carbon::create(Carbon::now()->year,1, 10));

        if($semester==2)
        $checkDate = Carbon::now()->between(Carbon::create(Carbon::now()->year,7, 1), Carbon::create(Carbon::now()->year,7, 10));


        if($checkDate==false)
            return back()->withErrors('El cupón no está disponible, comuníquese con la obra social')->withInput();
    

        if($semester==1)
            $expirationDate=Carbon::create(Carbon::now()->year,1, 10);
        else{
            $expirationDate=Carbon::create(Carbon::now()->year,7, 10);
        }

        
        $affiliate=AdultAffiliate::where('user_id','=',Auth::user()->id)->get()->first();
        $expirationDate=$expirationDate->format('Y-m-d');


        $daysInterest=0;
        $totalToPay=PaymentCouponController::computeTotalToPay($daysInterest);
        
        $payDate=$semester;

        $pdf = PDF::loadView('coupon.pdf',compact('affiliate','expirationDate','payDate','totalToPay'));
        return $pdf->download('coupon.pdf',compact('affiliate','expirationDate','payDate','totalToPay'));
    }

    public function createAnnual()
    {
 
        $currentMonth=Carbon::now()->month;
        $currentDay=Carbon::now()->day;

        $checkDate = Carbon::now()->between(Carbon::create(Carbon::now()->year,1, 1), Carbon::create(Carbon::now()->year,1, 10));

        if($checkDate==false)
            return back()->withErrors('El cupón no está disponible, comuníquese con la obra social')->withInput();
    

        $expirationDate=Carbon::create(Carbon::now()->year,1, 10);
        
        $affiliate=AdultAffiliate::where('user_id','=',Auth::user()->id)->get()->first();
        $expirationDate=$expirationDate->format('Y-m-d');


        $daysInterest=0;
        $totalToPay=PaymentCouponController::computeTotalToPay($daysInterest);
        
        $payDate=$currentMonth=Carbon::now()->year;;

        $pdf = PDF::loadView('coupon.pdf',compact('affiliate','expirationDate','payDate','totalToPay'));
        return $pdf->download('coupon.pdf',compact('affiliate','expirationDate','payDate','totalToPay'));
    }

    public function request(Request $request)
    {
        $affiliate=AdultAffiliate::where('user_id','=',Auth::user()->id)->get()->first();

        $way_to_pay=$affiliate->way_to_pay;

        return view('coupon.requestPaymentCoupon',compact('way_to_pay'));
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

    function computeTotalToPay($daysInterest)
    {
        $affiliate=AdultAffiliate::where('user_id','=',Auth::user()->id)->get()->first();
    
        $age=Carbon::parse($affiliate->birthdate)->age;

        if($age<25){
            $totalToPay=$affiliate->plan->price_under_25;
        }elseif($age>=25 && $age<40){
            $totalToPay=$affiliate->plan->price_from_25_to_40;
        }elseif($age>=40 && $age<60){
            $totalToPay=$affiliate->plan->price_from_40_to_60;
        }else{
            $totalToPay=$affiliate->plan->price_over_60;
        }

        foreach($affiliate->minorAffiliates as $minor){ 
            $totalToPay+=$affiliate->plan->price_under_25;
        }
        
        $interest=$daysInterest * ( ($totalToPay * 0.5) /100 ); 

        $totalToPay+=$interest;

        return $totalToPay;
    }

    

   


}
