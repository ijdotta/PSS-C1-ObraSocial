<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdultAffiliate extends Model
{
    use HasFactory;

    public function minorAffiliates()
    {
        return $this->hasMany(MinorAffiliate::class);
    }

    public static function storeAdultAffiliate($name, $surname, $birthdate, $DNI, $street, $streetNumber, $phoneNumber, $plan, $wayToPay, $password, $email, $location, $province)
    {
        if (isset($name)) {
            $affiliate = new AdultAffiliate();

            $affiliate->name = $name;
            $affiliate->surname = $surname;
            $affiliate->birthdate = $birthdate;
            $affiliate->DNI = $DNI;
            $affiliate->email = $email;
            $affiliate->password = $password;
            $affiliate->street = $street;
            $affiliate->street_number = $streetNumber;
            $affiliate->phone_number = $phoneNumber;
            $affiliate->plan_id = $plan;
            $affiliate->way_to_pay = $wayToPay;
            $affiliate->location = $location;
            $affiliate->province = $province;

            $affiliate->save();
        }
    }
}
