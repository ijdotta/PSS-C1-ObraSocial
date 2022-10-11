<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdultAffiliate extends Model
{
    use HasFactory;

    public function minorAffiliates()
    {
        return $this->hasMany(MinorAffiliate::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public static function storeAdultAffiliate($name, $surname, $birthdate, $DNI, $street, $streetNumber, $phoneNumber, $plan, $wayToPay, $password, $email, $location, $province, $user)
    {
        if (isset($name)) {
            $affiliate = new AdultAffiliate();

            $affiliate->name = $name;
            $affiliate->user_id = $user->id;
            $affiliate->surname = $surname;
            $affiliate->birthdate = $birthdate;
            $affiliate->DNI = $DNI;
            $affiliate->email = $email;
            $affiliate->street = $street;
            $affiliate->street_number = $streetNumber;
            $affiliate->phone_number = $phoneNumber;
            $affiliate->plan_id = $plan;
            $affiliate->way_to_pay = $wayToPay;
            $affiliate->location = $location;
            $affiliate->province = $province;

            /*
            $fields = 
                ['name' => $name, 'role' => UserRole::AFFILIATE->name, 'email' => $email, 'password' => $password]
            ;
            $userdab=User::create($fields);
*/
            //$affiliate->user_id = $userdab->id;

            $affiliate->save();
        }
    }
}
