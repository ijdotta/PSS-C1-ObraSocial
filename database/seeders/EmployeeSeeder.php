<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\EmployeeRole;
use App\Models\Address;
use App\Models\Employee;
use App\Models\User;
use App\Enums\UserRole;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'user_id' => '1',
            'role' => EmployeeRole::ADMIN->name,
            'name' => 'Admin',
            'lastname' => 'Istrador',
            'date_of_birth' => '1999-03-09',
            'DNI' => '1234',
            'email' => 'CREO QUE HAY QUE USAR MAIL DE USER',
            'address_id' => '1',
            'phone_number' => '1234',
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
