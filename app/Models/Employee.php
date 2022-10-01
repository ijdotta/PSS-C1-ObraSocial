<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum EmployeeRole {
    case ADMIN;
    case AREA_BOSS;
    case ADMINISTRATIVE;
}
class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
