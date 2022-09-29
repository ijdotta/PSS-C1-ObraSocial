<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\User;
use App\Models\Role;
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
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'Jefe de area']);
        Role::create(['name' => 'Administrativo']);
        Role::create(['name' => 'Cliente']);

        $adminRoleId = Role::where(['name' => 'admin'])->get()->first();

        User::create([
            'role_id' => $adminRoleId,
            'email' => 'admin@os.com',
            'password' => '1234'
        ]);
    }
}
