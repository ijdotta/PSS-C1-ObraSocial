<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinorAffiliate extends Model
{
    use HasFactory;

    public function adultAffiliate(){
        return $this->belongsTo(AdultAffiliate::class);
    }

    public static function storeMinorAffiliate($name, $surname, $dateBirth, $DNI, $phone, $adultAffiliateID){
        
        if(isset($name)){
            $affiliate=new MinorAffiliate();

            $affiliate->name=$name;
            $affiliate->sur_name=$surname;
            $affiliate->date_of_birth=$dateBirth;
            $affiliate->DNI=$DNI;
            $affiliate->phone=$phone;
            $affiliate->adultAffiliateID=$adultAffiliateID;

            $affiliate->save();

        }
        
    }
}
