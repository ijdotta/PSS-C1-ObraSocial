<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $plans=Plan::all();
        $plans = Plan::paginate(Controller::$RESULT_PAGINATION);

        return view('plan.index')->with('plans', $plans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan.create');
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
        $state = $request->get('state');

        $medical_consultations = $request->get('medical_consultations');
        $home_medical_consultations = $request->get('home_medical_consultations');
        $online_medical_consultations = $request->get('online_medical_consultations');
        $hospitalization = $request->get('hospitalization');
        $general_odontology = $request->get('general_odontology');

        $orthodontics = $request->get('orthodontics');
        $dental_prosthetics = $request->get('dental_prosthetics');
        $dental_implants = $request->get('dental_implants');
        $kinesiology = $request->get('kinesiology');
        $psychology = $request->get('psychology');

        $drugs_in_pharmacy = $request->get('drugs_in_pharmacy');
        $medications_in_hospital = $request->get('medications_in_hospital');
        $optics = $request->get('optics');
        $cosmetic_surgeries = $request->get('cosmetic_surgeries');
        $clinical_analysis = $request->get('clinical_analysis');

        $diagnostic_analysis = $request->get('diagnostic_analysis');
        $price_under_25 = $request->get('price_under_25');
        $price_from_25_to_40 = $request->get('price_from_25_to_40');
        $price_from_40_to_60 = $request->get('price_from_40_to_60');
        $price_over_60 = $request->get('price_over_60');

        if (Plan::where('name', '=', $name)->count() > 0)
            return response()->json(['message' => 'El nombre del plan ya esta registrado, ingrese un nombre distinto'], 200); //Hacer vista para cuando el nombre del plan ya esta registrado

        Plan::storePlan($name, $state, $medical_consultations,  $home_medical_consultations,
            $online_medical_consultations, $hospitalization, $general_odontology,
            $orthodontics, $dental_prosthetics, $dental_implants, $kinesiology, $psychology,
            $drugs_in_pharmacy, $medications_in_hospital, $optics, $cosmetic_surgeries, $clinical_analysis,
            $diagnostic_analysis, $price_under_25, $price_from_25_to_40, $price_from_40_to_60, $price_over_60
        );

        return redirect()->route('plans.index');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('plan.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    public function updatePlan(Request $request, Plan $plan)
    {
       
        $state = $request->get('state');

        $medical_consultations = $request->get('medical_consultations');
        $home_medical_consultations = $request->get('home_medical_consultations');
        $online_medical_consultations = $request->get('online_medical_consultations');
        $hospitalization = $request->get('hospitalization');
        $general_odontology = $request->get('general_odontology');

        $orthodontics = $request->get('orthodontics');
        $dental_prosthetics = $request->get('dental_prosthetics');
        $dental_implants = $request->get('dental_implants');
        $kinesiology = $request->get('kinesiology');
        $psychology = $request->get('psychology');

        $drugs_in_pharmacy = $request->get('drugs_in_pharmacy');
        $medications_in_hospital = $request->get('medications_in_hospital');
        $optics = $request->get('optics');
        $cosmetic_surgeries = $request->get('cosmetic_surgeries');
        $clinical_analysis = $request->get('clinical_analysis');

        $diagnostic_analysis = $request->get('diagnostic_analysis');
        $price_under_25 = $request->get('price_under_25');
        $price_from_25_to_40 = $request->get('price_from_25_to_40');
        $price_from_40_to_60 = $request->get('price_from_40_to_60');
        $price_over_60 = $request->get('price_over_60');

        
        Plan::updatePlan($plan, $state, $medical_consultations,  $home_medical_consultations,
            $online_medical_consultations, $hospitalization, $general_odontology,
            $orthodontics, $dental_prosthetics, $dental_implants, $kinesiology, $psychology,
            $drugs_in_pharmacy, $medications_in_hospital, $optics, $cosmetic_surgeries, $clinical_analysis,
            $diagnostic_analysis, $price_under_25, $price_from_25_to_40, $price_from_40_to_60, $price_over_60
        );
        
        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index');
    }
}

