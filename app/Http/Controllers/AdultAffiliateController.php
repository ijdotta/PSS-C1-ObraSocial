<?php

namespace App\Http\Controllers;

use App\Models\AdultAffiliate;
use App\Models\Plan;
use App\Models\User;
use App\Enums\UserRole;
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
        $planesEnUso=Plan::where('state', '=', 'En_uso')->get();

        return view('adult_affiliate.create',compact('planesEnUso'));
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
            return response()->json(['message' => 'ya hay un afiliado con ese DNI'], 200); //Hacer vista para cuando ya esta registrado el DNI

            if (AdultAffiliate::where('email', '=', $email)->count() > 0)
            return response()->json(['message' => 'Ya hay un afiliado con ese email'], 200); //Hacer vista para cuando ya esta registrado el mail

        if (!AdultAffiliateController::is_18($birthdate))
            return response()->json(['message' => 'El afiliado ingresado es menor de edad'], 200); //Hacer vista para cuando ya se intenta registrar un menor de edad

        AdultAffiliate::storeAdultAffiliate($name, $surname, $birthdate, $DNI, $street, $streetNumber, $phoneNumber, $plan, $wayToPay, $password, $email, $location, $province);

        return redirect()->route('adult_affiliates.index');
    }

    public function storeRegistro(Request $request)
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
            return response()->json(['message' => 'ya hay un afiliado con ese DNI'], 200); //Hacer vista para cuando ya esta registrado el DNI

            if (AdultAffiliate::where('email', '=', $email)->count() > 0)
            return response()->json(['message' => 'Ya hay un afiliado con ese email'], 200); //Hacer vista para cuando ya esta registrado el mail

        if (!AdultAffiliateController::is_18($birthdate))
            return response()->json(['message' => 'El afiliado ingresado es menor de edad'], 200); //Hacer vista para cuando ya se intenta registrar un menor de edad

        AdultAffiliate::storeAdultAffiliate($name, $surname, $birthdate, $DNI, $street, $streetNumber, $phoneNumber, $plan, $wayToPay, $password, $email, $location, $province);

        return view('dashboard');
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
        $planesEnUso=Plan::where('state', '=', 'En_uso')->get();
        return view('adult_affiliate.edit',compact('adultAffiliate','planesEnUso'));
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
        $adultAffiliate->street_number = $request->get('street_number');
        $adultAffiliate->phone_number = $request->get('phone_number');
        $adultAffiliate->plan = $request->get('plan');
        $adultAffiliate->way_to_pay = $request->get('way_to_pay');
        $adultAffiliate->password = $request->get('password');
        $adultAffiliate->email = $request->get('email');
        $adultAffiliate->location = $request->get('location');
        $adultAffiliate->province = $request->get('province');

        $adultAffiliate->save();
        
        return redirect()->route('adult_affiliates.index');
    }

    public function updateAffiliate(Request $request, AdultAffiliate $adultAffiliate)
    {
        $adultAffiliate->name = $request->get('name');
        $adultAffiliate->birthdate = $request->get('birthdate');
        $adultAffiliate->DNI = $request->get('DNI');
        $adultAffiliate->surname = $request->get('surname');
        $adultAffiliate->street = $request->get('street');
        $adultAffiliate->street_number = $request->get('street_number');
        $adultAffiliate->phone_number = $request->get('phone_number');
        $adultAffiliate->plan_id = $request->get('plan');
        $adultAffiliate->way_to_pay = $request->get('way_to_pay');
        $adultAffiliate->email = $request->get('email');
        $adultAffiliate->location = $request->get('location');
        $adultAffiliate->province = $request->get('province');

        $user=User::where('id','=', $adultAffiliate->user_id)->get()->first();

        $user->name = $request->get('name');

        $user->role = UserRole::AFFILIATE->name;
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $user->save();
        
        $adultAffiliate->user_id=$user->id;
        $adultAffiliate->save();
        
        return redirect()->route('adult_affiliates.index');
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
        return redirect()->route('adult_affiliates.index');
    }
}
