<?php

namespace App\Http\Controllers;

use App\Enums\BenefitStates;
use App\Enums\UserRole;
use App\Models\AdultAffiliate;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BenefitController extends Controller
{

    private $VIEWS_ROOT_PATH = 'benefits';

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
            return Benefit::all(); // Benefit::paginate(Controller::$RESULT_PAGINATION);
        }
        else 
        {
            $adultAffiliate = $this->adultAffiliate();
            if ($request == null)
            {
                return $adultAffiliate->benefits->all();
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

        return Benefit::whereBetween('created_at', [$from, $to])->get();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adultAffiliate = $this->adultAffiliate();
        return view($this->VIEWS_ROOT_PATH.'.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Warning: this method should be only used by an "AFFILIATE" user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adultAffiliate = $this->adultAffiliate(); // may be null if user is not adult affiliate. 
        $this->validateBenefit($request);
        $this->createBenefit($adultAffiliate, $request);

        return redirect(route('benefits.index', [$adultAffiliate->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit(Benefit $benefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdultAffiliate  $adultAffiliate
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Benefit $benefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefit $benefit)
    {
        //
    }

    private function validateBenefit(Request $request)
    {
        $tomorrow = Carbon::now()->addDay();

        return $request->validate([
            'provider' => 'required',
            'service_date' => 'required|date|after_or_equal:tomorrow',
            'medical_order' => 'required|image',
            'medical_history' => 'mimes:pdf',
        ]);
    }

    private function createBenefit(AdultAffiliate $adultAffiliate, Request $fields)
    {
        $medicalHistoryFile = $fields->file('medical_history');

        $benefit = new Benefit();
        $benefit->adult_affiliate_id = $adultAffiliate->id;
        $benefit->provider = $fields->provider;
        $benefit->service_date = $fields->service_date;
        $benefit->path_to_medical_order = $fields->file('medical_order')->store('orders');
        $benefit->path_to_medical_history = $medicalHistoryFile != null ? $medicalHistoryFile->store('histories') : null;
        $benefit->comment = $fields->comment ?? '';
        $benefit->save();
    }

    private function adultAffiliate() : ?AdultAffiliate
    {
        $user = Auth::user();
        return $user->role == UserRole::AFFILIATE->name ? $user->adultAffiliate : null;
    }
}
