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
        $adultAffiliates = AdultAffiliate::all();

        return view('adult_affiliate.index')->with('adultAffiliates', $adultAffiliates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adult_affiliate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $surname = $request->get('surname');
        $birthdate = $request->get('birthdate');
        $DNI = $request->get('DNI');
        $street = $request->get('street');
        $streetNumber = $request->get('streetNumber');
        $phoneNumber = $request->get('phoneNumber');
        $plan = $request->get('plan');
        $wayToPay = $request->get('wayToPay');
        $password = $request->get('password');
        $passwordAux = $request->get('passwordConfirmation');
        $email = $request->get('email');
        $location = $request->get('location');
        $province = $request->get('province');


        if ($password != $passwordAux)
            return response()->json(['message' => 'contraseña incorrecta'], 200); //Hacer vista para cuando la password no coincide

        if (AdultAffiliate::where('DNI', '=', $DNI)->count() > 0)
            return response()->json(['message' => 'DNI ya registrado'], 200); //Hacer vista para cuando ya esta registrado el DNI

        if (!AdultAffiliateController::is_18($birthdate))
            return response()->json(['message' => 'Es menor de edad'], 200); //Hacer vista para cuando ya se intenta registrar un menor de edad

        AdultAffiliate::storeAdultAffiliate($name, $surname, $birthdate, $DNI, $street, $streetNumber, $phoneNumber, $plan, $wayToPay, $password, $email, $location, $province);

        return redirect()->route('dashboard');
    }

    function is_18($birthdate)
    {
        $dobObject = new DateTime(date("Y-m-d", strtotime($birthdate)));
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
        $adultAffiliate->name = $request->get('name');
        $adultAffiliate->birthdate = $request->get('birthdate');
        $adultAffiliate->DNI = $request->get('DNI');
        $adultAffiliate->surname = $request->get('surname');
        $adultAffiliate->street = $request->get('street');
        $adultAffiliate->street_number = $request->get('streetNumber');
        $adultAffiliate->phone_number = $request->get('phone_number');
        $adultAffiliate->plan = $request->get('plan');
        $adultAffiliate->wayToPay = $request->get('wayToPay');
        $adultAffiliate->password = $request->get('password');
        $adultAffiliate->email = $request->get('email');
        $adultAffiliate->location = $request->get('location');
        $adultAffiliate->province = $request->get('province');

        $adultAffiliate->save();
        
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdultAffiliate  $adultAffiliate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdultAffiliate $adultAffiliate)
    {
        $adultAffiliate->delete();
        return redirect()->route('dashboard');
    }
}
