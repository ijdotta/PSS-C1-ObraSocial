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

        User::create([
            'name' => 'fry',
            'role' => UserRole::EMPLOYEE->name,
            'email' => 'admin@os.com',
            'password' => '1234'
        ]);

        Employee::factory(10)
                ->state(function () { return [
                    'user_id' => function () { return User::factory(1)->createOne(['role' => EmployeeRole::ADMIN->name])->id; },
                    'address_id' => function () { return Address::factory(1)->createOne()->id; },
                    // 'plan_id' => function () { return Plan::factory(1)->createOne()->id; }
                    // 'plan_id' => function () { return Plan::pluck('id')->random(); }
                ];})
                ->create();
    }
    
}
