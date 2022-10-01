<?php

namespace App\Http\Controllers;

use App\Models\MinorAffiliate;
use Illuminate\Http\Request;
use DateTime;

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
        $name=$request->get('name');
        $surname=$request->get('surname');
        $dateBirth=$request->get('dateBirth');
        $DNI=$request->get('DNI');
        $phone=$request->get('phone');
        $adultAffiliateID=$request->get('adultAffiliateID');
 
        if(MinorAffiliate::where('DNI','=',$DNI)->count() > 0)
            return response()->json(['message' => 'DNI ya registrado'],200); //Hacer vista para cuando ya esta registrado el DNI
        
        if(!MinorAffiliateController::is_minor($dateBirth))
            return response()->json(['message' => 'Es mayor de edad'],200); //Hacer vista para cuando ya se intenta registrar un mayor de edad

        if(AdultAffiliate::where('ID','=',$adultAffiliateID)->count() < 1)
            return response()->json(['message' => 'El ID del mayor responsable no es valido'],200); //Corroborar que funcione cuando ya tengamos adultos
        

        MinorAffiliate::storeMinorAffiliate($name, $surname, $dateBirth, $DNI, $phone, $adultAffiliateID);
        
        return redirect()->route('dashboard');
    }

    function is_minor($dateBirth){
        $dobObject = new DateTime(date("Y-m-d", strtotime($dateBirth)));
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
        //
    }
}
