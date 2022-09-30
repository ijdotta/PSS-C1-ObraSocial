<?php

namespace App\Http\Controllers;

use App\Models\AdultAffiliate;
use Illuminate\Http\Request;
use DateTime;

class AdultAffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms/newAdultAffiliateForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->get('name');
        $surname=$request->get('surname');
        $dateBirth=$request->get('dateBirth');
        $DNI=$request->get('DNI');
        $street=$request->get('street');
        $streetNumber=$request->get('streetNumber');
        $phone=$request->get('phone');
        $plan=$request->get('plan');
        $wayToPay=$request->get('wayToPay');
        $password=$request->get('password1');
        $passwordAux=$request->get('password2');
        $email=$request->get('email');
        $location=$request->get('location');
        $province=$request->get('province');
 

        if($password!=$passwordAux)
            return response()->json(['message' => 'contraseña incorrecta'],200); //Hacer vista para cuando la password no coincide

        if(AdultAffiliate::where('DNI','=',$DNI)->count() > 0)
            return response()->json(['message' => 'DNI ya registrado'],200); //Hacer vista para cuando ya esta registrado el DNI
        
        if(!AdultAffiliateController::is_18($dateBirth))
            return response()->json(['message' => 'Es menor de edad'],200); //Hacer vista para cuando ya se intenta registrar un menor de edad

        AdultAffiliate::storeAdultAffiliate($name, $surname, $dateBirth, $DNI, $street, $streetNumber, $phone, $plan, $wayToPay, $password, $email, $location, $province);
        
        return redirect()->route('dashboard');
    }

    function is_18($dateBirth){
        $dobObject = new DateTime(date("Y-m-d", strtotime($dateBirth)));
        $nowObject = new DateTime();
        
        return $dobObject < $nowObject ? ($dobObject->diff($nowObject)->y > 18) : false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdultAffiliate  $adultAffiliate
     * @return \Illuminate\Http\Response
     */
    public function show(AdultAffiliate $adultAffiliate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdultAffiliate  $adultAffiliate
     * @return \Illuminate\Http\Response
     */
    public function edit(AdultAffiliate $adultAffiliate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdultAffiliate  $adultAffiliate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdultAffiliate $adultAffiliate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdultAffiliate  $adultAffiliate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdultAffiliate $adultAffiliate)
    {
        //
    }
}
