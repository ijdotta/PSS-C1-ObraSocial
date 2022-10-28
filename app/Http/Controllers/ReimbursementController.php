<?php

namespace App\Http\Controllers;

use App\Models\Reimbursement;
use Illuminate\Http\Request;
use App\Models\MedicalRequest;
use App\Models\Invoice;
use App\Models\ClinicHistory;
use App\Models\AdultAffiliate;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Enums\BenefitStates;
use App\Enums\UserRole;


class ReimbursementController extends Controller
{
    private $VIEWS_ROOT_PATH = 'reimbursement';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getBenefitsIndexView(null);
    }

    public function filteredIndex(Request $request)
    {
        return $this->getBenefitsIndexView($request);
    }

    private function getBenefitsIndexView(?Request $request)
    {
        $benefits = $this->getBenefits($request);
        $benefitStates = BenefitStates::array();

        return view($this->VIEWS_ROOT_PATH.'.index')
                ->with('benefits', $benefits)
                ->with('benefitStates', $benefitStates);
    }

    private function getBenefits(?Request $request)
    {
        if (Auth::user()->role == UserRole::EMPLOYEE->name)
        {
            return Reimbursement::all(); // Benefit::paginate(Controller::$RESULT_PAGINATION);
        }
        else 
        {
            $adultAffiliate = $this->adultAffiliate();
            if ($request == null)
            {
                return $adultAffiliate->reimbursements->all();
            }
            else
            {
                return $this->getFilteredBenefits($request);
            }
        }
    }

    private function getFilteredBenefits(Request $request)
    {
        $from = $request->from != null ? Carbon::createFromFormat('Y-m-d', $request->from) : Carbon::minValue();
        $from->setHour(0);
        $from->setMinute(0);
        $from->setSecond(0);
        clock('from: '.$from);
        
        $to = $request->to != null ? Carbon::createFromFormat('Y-m-d', $request->to) : Carbon::maxValue();
        $to->setHour(23);
        $to->setMinute(59);
        $to->setSecond(59);
        clock('to: '.$from);

        return Reimbursement::whereBetween('created_at', [$from, $to])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reimbursement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(   
            ['date' => 'before:yesterday'] 
        );   

        $reimbursement= new Reimbursement();
        $reimbursement->cuit_cuil=$request->cuit_cuil;
        $reimbursement->service_date=$request->date;

        if($request->comment){
            $reimbursement->comment=$request->comment;
        }

        $adultAffiliate = $this->adultAffiliate();

        $reimbursement->adult_affiliate_id = $adultAffiliate->id;

        $reimbursement->save();

        /**Imagen de solicitud medica **/
        $data= new MedicalRequest();
        if($request->file('image_medical_request')){
            $file= $request->file('image_medical_request');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->reimbursement_id=$reimbursement->id;
        $data->save();

        /**Imagen/archivo  de factura **/
        $invoice= new Invoice();
        if($request->file('invoice')){
            $file= $request->file('invoice');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/File'), $filename);
            $invoice['image']= $filename;
        }
        $invoice->reimbursement_id=$reimbursement->id;
        $invoice->save();

        /**archivo de historia clinica**/
        $clinic_history= new ClinicHistory();
        if($request->file('clinic_history')){
            $file= $request->file('clinic_history');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/File'), $filename);
            $clinic_history['file']= $filename;
        }
        $clinic_history->reimbursement_id=$reimbursement->id;
        $clinic_history->save();

        return redirect()->route('reimbursements.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reimbursement  $reimbursement
     * @return \Illuminate\Http\Response
     */
    public function show(reimbursement $reimbursement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reimbursement  $reimbursement
     * @return \Illuminate\Http\Response
     */
    public function edit(reimbursement $reimbursement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reimbursement  $reimbursement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reimbursement $reimbursement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reimbursement  $reimbursement
     * @return \Illuminate\Http\Response
     */
    public function destroy(reimbursement $reimbursement)
    {
        //
    }

    private function adultAffiliate() : ?AdultAffiliate
    {
        $user = Auth::user();
        return $user->role == UserRole::AFFILIATE->name ? $user->adultAffiliate : null;
    }
}
