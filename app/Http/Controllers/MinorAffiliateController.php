<?php

namespace App\Http\Controllers;

use App\Models\MinorAffiliate;
use Illuminate\Http\Request;
use DateTime;
use App\Models\AdultAffiliate;
use Illuminate\Database\QueryException;

class MinorAffiliateController extends Controller
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
        return view('forms/newMinorAffiliateForm');
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
        $phone = $request->get('phoneNumber');
        $adultAffiliateID = $request->get('adultAffiliateID');

        if (MinorAffiliate::where('DNI', '=', $DNI)->count() > 0)
            return response()->json(['message' => 'DNI ya registrado'], 200); //Hacer vista para cuando ya esta registrado el DNI

        if (!MinorAffiliateController::is_minor($birthdate))
            return response()->json(['message' => 'Es mayor de edad'], 200); //Hacer vista para cuando ya se intenta registrar un mayor de edad

        if (AdultAffiliate::where('ID', '=', $adultAffiliateID)->count() < 1)
            return response()->json(['message' => 'El ID del mayor responsable no es valido'], 200); //Corroborar que funcione cuando ya tengamos adultos

        try{
            MinorAffiliate::storeMinorAffiliate($name, $surname, $birthdate, $DNI, $phone, $adultAffiliateID);
        } catch (QueryException $ex){
            $message = 'hubo un error';
            session()->flash('message', $message);
        }

        return redirect()->route('dashboard');
    }

    function is_minor($birthdate)
    {
        $dobObject = new DateTime(date("Y-m-d", strtotime($birthdate)));
        $nowObject = new DateTime();

        return $dobObject < $nowObject ? ($dobObject->diff($nowObject)->y > 18) : true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MinorAffiliate  $minorAffiliate
     * @return \Illuminate\Http\Response
     */
    public function show(MinorAffiliate $minorAffiliate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MinorAffiliate  $minorAffiliate
     * @return \Illuminate\Http\Response
     */
    public function edit(MinorAffiliate $minorAffiliate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MinorAffiliate  $minorAffiliate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MinorAffiliate $minorAffiliate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MinorAffiliate  $minorAffiliate
     * @return \Illuminate\Http\Response
     */
    public function destroy(MinorAffiliate $minorAffiliate)
    {
        $minorAffiliate->delete();
        return redirect()->route('dashboard');
    }
}
