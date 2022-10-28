<?php

namespace App\Http\Controllers;

use App\Enums\BenefitStates;
use App\Models\Benefit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BenefitEvaluationController extends BenefitController
{

    public function index() 
    {
        $benefits = Benefit::where('state', BenefitStates::REQUESTED->name)->orderBy('created_at', 'asc')->get()->all();
        $benefitStates = BenefitStates::array();
        
        return view('benefits.evaluation.index')
                ->with('benefits', $benefits)
                ->with('benefitStates', $benefitStates);
    }

    public function evaluate(Request $request, $id)
    {
        clock($id);
        $benefit = Benefit::find($id);
        clock($benefit);

        return view('benefits.evaluation.evaluate')
                ->with('benefit', $benefit);
    }

    public function downloadMedicalOrder(Request $request, $id) 
    {
        $benefit = Benefit::find($id);
        return Storage::download($benefit->path_to_medical_order);
    }

    public function downloadMedicalHistory(Request $request, $id) 
    {
        $benefit = Benefit::find($id);
        return Storage::download($benefit->path_to_medical_history);
    }

    public function approve(Request $request, $id) 
    {
        $benefit = Benefit::find($id);
        $benefit->state = BenefitStates::APPROVED->name;
        $benefit->save();
        return redirect(route('benefitsToEvaluate'));
    }

    public function reject(Request $request, $id) 
    {
        $benefit = Benefit::find($id);
        $benefit->state = BenefitStates::REJECTED->name;
        $benefit->save();
        return redirect(route('benefitsToEvaluate'));
    }
    
}
