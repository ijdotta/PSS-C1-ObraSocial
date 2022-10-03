<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MinorAffiliate;

class MinorAffiliatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Menor1 = new MinorAffiliate();
        $Menor1->name='Priscilla Ruiz';
        $Menor1->surname='Curiel';
        $Menor1->DNI=32194138;
        $Menor1->birthdate='2004-11-08';
        $Menor1->phone_number=659407680;
        $Menor1->adult_affiliate_id=2;
        $Menor1->save();

        $Menor1 = new MinorAffiliate();
        $Menor1->name='Vic Botello';
        $Menor1->surname='Sevilla';
        $Menor1->DNI=48159441;
        $Menor1->birthdate='2013-12-04';
        $Menor1->phone_number=692950447;
        $Menor1->adult_affiliate_id=3;
        $Menor1->save();

        $Menor1 = new MinorAffiliate();
        $Menor1->name='Magda Escalante';
        $Menor1->surname='Aviles';
        $Menor1->DNI=79771743;
        $Menor1->birthdate='2013-04-10';
        $Menor1->phone_number=659407680;
        $Menor1->adult_affiliate_id=3;
        $Menor1->save();
    }
}
