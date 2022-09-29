<?php

namespace App\Http\Controllers;

use App\Models\AdultAffiliate;
use Illuminate\Http\Request;

class AdultAffiliateController extends Controller
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
        return view('forms/newAdultAffiliateForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdultAffiliate  $adultAffiliate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdultAffiliate $adultAffiliate)
    {
        //
    }
}
