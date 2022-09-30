<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdultAffiliate extends Model
{
    use HasFactory;

    public static function storeAdultAffiliate($name, $surname, $dateBirth, $DNI, $street, $streetNumber, $phone, $plan, $wayToPay, $password, $email, $location, $province){
        
        if(isset($name)){
            $affiliate=new AdultAffiliate();

            $affiliate->name=$name;
            $affiliate->sur_name=$surname;
            $affiliate->date_of_birth=$dateBirth;
            $affiliate->DNI=$DNI;
            $affiliate->email=$email;
            $affiliate->password=$password;
            $affiliate->street=$street;
            $affiliate->street_number=$streetNumber;
            $affiliate->phone=$phone;
            $affiliate->plan_id=$plan;
            $affiliate->way_to_pay=$wayToPay;
            $affiliate->location=$location;
            $affiliate->province=$province;

            $affiliate->save();

        }
        
    }
}
