<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinorAffiliate extends Model
{
    use HasFactory;

    public function adultAffiliate()
    {
        return $this->belongsTo(AdultAffiliate::class);
    }

    public static function storeMinorAffiliate($name, $surname, $birthdate, $DNI, $phoneNumber, $adultAffiliateID)
    {
        if (isset($name)) {
            $affiliate = new MinorAffiliate();

            $affiliate->name = $name;
            $affiliate->surname = $surname;
            $affiliate->birthdate = $birthdate;
            $affiliate->DNI = $DNI;
            $affiliate->phone_number = $phoneNumber;
            $affiliate->adult_affiliate_id = $adultAffiliateID;

            $affiliate->save();
        }
    }
}
