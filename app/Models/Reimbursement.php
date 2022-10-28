<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MedicalRequest;
use App\Models\Invoice;
use App\Models\ClinicHistory;

class reimbursement extends Model
{
    use HasFactory;

    public function adult_affiliate()
    {
        return $this->belongsTo(AdultAffiliate::class);
    }

    public function medical_request()
    {
        return $this->hasOne(MedicalRequest::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function clinic_history()
    {
        return $this->hasOne(ClinicHistory::class);
    }

}
