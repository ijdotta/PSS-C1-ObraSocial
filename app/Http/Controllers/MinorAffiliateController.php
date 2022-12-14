<?php

namespace App\Http\Controllers;

use App\Models\MinorAffiliate;
use Illuminate\Http\Request;
use DateTime;
use App\Models\AdultAffiliate;
use Illuminate\Database\QueryException;
use App\Enums\UserRole;

class MinorAffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user();
        
        if (strcmp($user->role, UserRole::AFFILIATE->name) == 0) {
            $adult_affiliate_id = $user->profile->id;
            $minorAffiliates = MinorAffiliate::where('adult_affiliate_id', $adult_affiliate_id)->paginate(Controller::$RESULT_PAGINATION);
        } else {            
            $minorAffiliates = MinorAffiliate::paginate(Controller::$RESULT_PAGINATION);
        } 

        return view('minor_affiliate.index')
                ->with('minorAffiliates', $minorAffiliates);
    }

    public function indexByAdult(AdultAffiliate $adultAffiliate)
    {

        $minorAffiliates = MinorAffiliate::where('adult_affiliate_id', $adultAffiliate->id)->paginate(Controller::$RESULT_PAGINATION);

        return view('minor_affiliate.indexByAdult', [
            'minorAffiliates'=>$minorAffiliates,
            'adultAffiliate'=>$adultAffiliate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $perfil = $user->profile->name.'-----'.$user->role;
        return view('minor_affiliate.create')->with('jajas', $perfil);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $user = auth()->user();

        $name = $request->get('name');
        $surname = $request->get('surname');
        $birthdate = $request->get('birthdate');
        $DNI = $request->get('DNI');
        $phoneNumber = $request->get('phoneNumber');
        if (strcmp($user->role, UserRole::AFFILIATE->name) == 0) {
            $adultAffiliate = $user->profile;
            $adultAffiliateID = $adultAffiliate->id;
        } else {            
            $adultAffiliateID = $request->get('adultAffiliateID');
        }        

        if (MinorAffiliate::where('DNI', '=', $DNI)->count() > 0)
            return response()->json(['message' => 'DNI ya registrado'], 200); //Hacer vista para cuando ya esta registrado el DNI

        if (MinorAffiliateController::is_minor($birthdate))
            return response()->json(['message' => 'Es mayor de edad'], 200); //Hacer vista para cuando ya se intenta registrar un mayor de edad

        if (AdultAffiliate::where('id', '=', $adultAffiliateID)->count() < 1)
            return response()->json(['message' => 'El ID del mayor responsable no es valido'], 200); //Corroborar que funcione cuando ya tengamos adultos

        try {
            MinorAffiliate::storeMinorAffiliate($name, $surname, $birthdate, $DNI, $phoneNumber, $adultAffiliateID);
        } catch (QueryException $ex) {
            $message = 'hubo un error';
            session()->flash('message', $message);
        }

        return redirect()->route('minor_affiliates.index');
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
        return view('minor_affiliate.edit')
                -> with('minor_affiliates',$minorAffiliate);
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

        if($request->get('name') == NULL){
            $minorAffiliate->name = MinorAffiliate::where('id', '=', $request->get('id'))->value('name');
        } else {
            $minorAffiliate->name = $request->get('name');
        }
        
        if($request->get('surname') == NULL){
            $minorAffiliate->surname = MinorAffiliate::where('id', '=', $request->get('id'))->value('surname');
        } else {
            $minorAffiliate->surname = $request->get('surname');
        }

        if($request->get('birthdate') == NULL){
            $minorAffiliate->birthdate = MinorAffiliate::where('id', '=', $request->get('id'))->value('birthdate');
        } else {
            $minorAffiliate->birthdate = $request->get('birthdate');
        }

        if($request->get('DNI') == NULL){
            $minorAffiliate->DNI = MinorAffiliate::where('id', '=', $request->get('id'))->value('DNI');
        } else {
            $minorAffiliate->DNI = $request->get('DNI');
        }

        if($request->get('phone_number') == NULL){
            $minorAffiliate->phone_number = MinorAffiliate::where('id', '=', $request->get('id'))->value('phone_number');
        } else {
            $minorAffiliate->phone_number = $request->get('phone_number');
        }

        $minorAffiliate->save();
        
        return redirect()->route('minor_affiliates.index');
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
        return redirect()->route('minor_affiliates.index');
    }

    public function destroyByAdultAffiliate(AdultAffiliate $adultAffiliate, MinorAffiliate $minorAffiliate)
    {
        $minorAffiliate->delete();
        return redirect()->route('edit_adult_minors', $adultAffiliate);
    }
}
