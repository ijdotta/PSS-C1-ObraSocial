<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'DNI' => 12345678,
            'name' => 'fry',
            'role' => UserRole::EMPLOYEE->name,
            'email' => 'admin@os.com',
            'password' => '1234'
        ]);

        User::create([
            'DNI' => 87654321,
            'name' => 'Adul To1',
            'role' => UserRole::AFFILIATE->name,
            'email' => 'adul@to1.com',
            'password' => '1234'
        ]);

        User::create([
            'DNI' => 33444555,
            'name' => 'Adul To2',
            'role' => UserRole::AFFILIATE->name,
            'email' => 'adul@to2.com',
            'password' => '1234'
        ]);

        User::create([
            'DNI' => 44555666,
            'name' => 'Adul To3',
            'role' => UserRole::AFFILIATE->name,
            'email' => 'adul@to3.com',
            'password' => '1234'
        ]);
    }
}
