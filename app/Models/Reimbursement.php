<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postimage;

class reimbursement extends Model
{
    use HasFactory;

    public function medical_request()
    {
        return $this->hasOne(Postimage::class);
    }

}
