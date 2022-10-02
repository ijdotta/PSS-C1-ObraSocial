<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['role' => 'admin']);
        Role::create(['role' => 'Jefe de area']);
        Role::create(['role' => 'Administrativo']);
        Role::create(['role' => 'Cliente']);
    }
}
