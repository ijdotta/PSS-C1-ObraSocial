<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\EmployeeRole;
use App\Enums\UserRole;
use App\Models\Address;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(PlanTestAfiliado::class);
        $this->call(AdultAffiliatesSeeder::class);
        $this->call(MinorAffiliatesSeeder::class);       
    }
    
}
