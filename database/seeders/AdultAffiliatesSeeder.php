<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdultAffiliate;

class AdultAffiliatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Adulto1 = new AdultAffiliate();
        $Adulto1->name='Ariadna Menchaca';
        $Adulto1->surname='Farias';
        $Adulto1->birthdate='1993-10-04';
        $Adulto1->DNI=15650258;
        $Adulto1->email='AriadnaMenchacaFarias@rhyta.com';
        $Adulto1->user_id=2;
        $Adulto1->street='New Street';
        $Adulto1->street_number='816';
        $Adulto1->phone_number=5413311682;
        $Adulto1->plan_id=1;
        $Adulto1->way_to_pay=0;
        $Adulto1->location='CABA';
        $Adulto1->province='Buenos Aires';
        $Adulto1->save();

        $Adulto2 = new AdultAffiliate();
        $Adulto2->name='Tyson Montemayor';
        $Adulto2->surname='Rocha';
        $Adulto2->birthdate='1997-05-10';
        $Adulto2->DNI=76327340;
        $Adulto2->email='TysonMontemayorRocha@teleworm.us';
        $Adulto2->user_id=3;
        $Adulto2->street='Joes Road';
        $Adulto2->street_number='3757';
        $Adulto2->phone_number=5186729688;
        $Adulto2->plan_id=1;
        $Adulto2->way_to_pay=1;
        $Adulto2->location='Quest';
        $Adulto2->province='Misiones';
        $Adulto2->save();

        $Adulto3 = new AdultAffiliate();
        $Adulto3->name='Helvia Olivarez';
        $Adulto3->surname='Abreu';
        $Adulto3->birthdate='2002-10-09';
        $Adulto3->DNI=66906250;
        $Adulto3->email='HelviaOlivarezAbreu@dayrep.com';
        $Adulto3->user_id=4;
        $Adulto3->street='Nickel Road';
        $Adulto3->street_number='2480';
        $Adulto3->phone_number=5413311682;
        $Adulto3->plan_id=1;
        $Adulto3->way_to_pay=2;
        $Adulto3->location='Pasadena';
        $Adulto3->province='Santa Fe';
        $Adulto3->save();
    }
}
