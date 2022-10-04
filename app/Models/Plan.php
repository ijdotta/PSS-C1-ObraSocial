<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public static function storePlan($name, $state, $medical_consultations,  $home_medical_consultations,
    $online_medical_consultations, $hospitalization, $general_odontology,
    $orthodontics, $dental_prosthetics, $dental_implants, $kinesiology, $psychology,
    $drugs_in_pharmacy, $medications_in_hospital, $optics, $cosmetic_surgeries, $clinical_analysis,
    $diagnostic_analysis, $price_under_25, $price_from_25_to_40, $price_from_40_to_60, $price_over_60){
        
            if (isset($name)) {
                $plan = new Plan();

                $plan->name = $name;
                $plan->state = $state;

                $plan->medical_consultations = $medical_consultations;
                $plan->home_medical_consultations = $home_medical_consultations;
                $plan->online_medical_consultations = $online_medical_consultations;
                $plan->hospitalization = $hospitalization;
                $plan->general_odontology = $general_odontology;

                $plan->orthodontics = $orthodontics;
                $plan->dental_prosthetics = $dental_prosthetics;
                $plan->dental_implants = $dental_implants;
                $plan->kinesiology = $kinesiology;
                $plan->psychology = $psychology;

                $plan->drugs_in_pharmacy = $drugs_in_pharmacy;
                $plan->medications_in_hospital = $medications_in_hospital;
                $plan->optics = $optics;
                $plan->cosmetic_surgeries = $cosmetic_surgeries;
                $plan->clinical_analysis = $clinical_analysis;

                $plan->diagnostic_analysis = $diagnostic_analysis;
                $plan->price_under_25 = $price_under_25;
                $plan->price_from_25_to_40 = $price_from_25_to_40;
                $plan->price_from_40_to_60 = $price_from_40_to_60;
                $plan->price_over_60 = $price_over_60;

                $plan->save();
            }
    }

    public static function updatePlan($plan, $state, $medical_consultations,  $home_medical_consultations,
    $online_medical_consultations, $hospitalization, $general_odontology,
    $orthodontics, $dental_prosthetics, $dental_implants, $kinesiology, $psychology,
    $drugs_in_pharmacy, $medications_in_hospital, $optics, $cosmetic_surgeries, $clinical_analysis,
    $diagnostic_analysis, $price_under_25, $price_from_25_to_40, $price_from_40_to_60, $price_over_60){
        
            if (isset($plan)) {
                $plan->state = $state;

                $plan->medical_consultations = $medical_consultations;
                $plan->home_medical_consultations = $home_medical_consultations;
                $plan->online_medical_consultations = $online_medical_consultations;
                $plan->hospitalization = $hospitalization;
                $plan->general_odontology = $general_odontology;

                $plan->orthodontics = $orthodontics;
                $plan->dental_prosthetics = $dental_prosthetics;
                $plan->dental_implants = $dental_implants;
                $plan->kinesiology = $kinesiology;
                $plan->psychology = $psychology;

                $plan->drugs_in_pharmacy = $drugs_in_pharmacy;
                $plan->medications_in_hospital = $medications_in_hospital;
                $plan->optics = $optics;
                $plan->cosmetic_surgeries = $cosmetic_surgeries;
                $plan->clinical_analysis = $clinical_analysis;

                $plan->diagnostic_analysis = $diagnostic_analysis;
                $plan->price_under_25 = $price_under_25;
                $plan->price_from_25_to_40 = $price_from_25_to_40;
                $plan->price_from_40_to_60 = $price_from_40_to_60;
                $plan->price_over_60 = $price_over_60;

                $plan->save();
            }
        }

}
