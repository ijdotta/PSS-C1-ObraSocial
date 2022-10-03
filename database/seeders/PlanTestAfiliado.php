<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanTestAfiliado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan1 = new Plan();
        $plan1->name='planD';
        $plan1->state='En_uso';

        $plan1->medical_consultations=1;
        $plan1->home_medical_consultations=1;
        $plan1->online_medical_consultations=1;
        $plan1->hospitalization=1;
        $plan1->general_odontology=1;

        $plan1->orthodontics=1;
        $plan1->dental_prosthetics=1;
        $plan1->dental_implants=1;
        $plan1->kinesiology=1;
        $plan1->psychology=1;
        
        $plan1->drugs_in_pharmacy=1;
        $plan1->medications_in_hospital=1;
        $plan1->optics=1;
        $plan1->cosmetic_surgeries=1;
        $plan1->clinical_analysis=1;
        
        $plan1->diagnostic_analysis=1;
        $plan1->price_under_25=1;
        $plan1->price_from_25_to_40=1;
        $plan1->price_from_40_to_60=1;
        $plan1->price_over_60=1;

        $plan1->save();
    
    }
}
