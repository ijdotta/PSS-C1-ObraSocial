<?php

namespace App\Http\Controllers;

use App\Models\Reimbursement;
use Illuminate\Http\Request;
use App\Models\MedicalRequest;
use App\Models\Invoice;
use App\Models\ClinicHistory;
use DateTime;


class ReimbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Reimbursement::all();
        return view('reimbursement.index', compact('data'));
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

        if($request->comment){
            $reimbursement->comment=$request->comment;
        }

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
}
