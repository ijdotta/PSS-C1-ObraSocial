<?php

namespace App\Http\Controllers;

use App\Enums\BenefitStates;
use App\Models\reimbursement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReimbursementEvaluationController extends ReimbursementController
{
    public function index() 
    {
        $reimbursements = reimbursement::where('state', BenefitStates::REQUESTED->name)->orderBy('created_at', 'asc')->get()->all();
        return view('reimbursement.evaluation.index')
                ->with('reimbursements', $reimbursements);
    }

    public function evaluate(Request $request, $id) 
    {
        $reimbursement = reimbursement::find($id);
        return view('reimbursement.evaluation.evaluate')
                ->with('reimbursement', $reimbursement);
    }

    public function approve(Request $request, $id)
    {
        $reimbursement = reimbursement::find($id);
        $reimbursement->state = BenefitStates::APPROVED->name;
        $reimbursement->save();

        return redirect(route('reimbursementsToEvaluate'));
    }

    public function reject(Request $request, $id)
    {
        $reimbursement = reimbursement::find($id);
        $reimbursement->state = BenefitStates::REJECTED->name;
        $reimbursement->save();

        return redirect(route('reimbursementsToEvaluate'));
    }

    public function downloadInvoice(Request $request, $id)
    {
        $reimbursement = reimbursement::find($id);
        $invoice = $reimbursement->invoice;
        return $invoice && $invoice->image ? Storage::download($invoice->image) : redirect()->back()->withErrors(['file not found' => 'La factura no existe']);
    }

    public function downloadMedicalRequest(Request $request, $id)
    {
        $reimbursement = reimbursement::find($id);
        $medical_request = $reimbursement->medical_request;
        return $medical_request && $medical_request->image ? Storage::download($medical_request->image) : redirect()->back()->withErrors(['file not found' => 'La solicitud médica no existe']);
    }

    public function downloadMedicalHistory(Request $request, $id)
    {
        $reimbursement = reimbursement::find($id);
        $clinic_history = $reimbursement->clinic_history;
        return $clinic_history && $clinic_history->file ? Storage::download($clinic_history->file) : redirect()->back()->withErrors(['file not found' => 'La historia clínica no existe']);
    }
}
