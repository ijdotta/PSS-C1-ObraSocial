<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Employee;
use App\Models\Plan;
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

        $adminRoleId = Role::where(['name' => 'admin'])->get()->first()->id;

        User::create([
            'role_id' => $adminRoleId,
            'email' => 'admin@os.com',
            'password' => '1234'
        ]);

        User::factory(10)->create(['role_id' => $adminRoleId]);

        Plan::factory(10)->create();

        Employee::factory(10)
                ->state(function () use ($adminRoleId) { return [
                    'user_id' => function () use ($adminRoleId) { return User::factory(1)->createOne(['role_id' => $adminRoleId])->id; },
                    'address_id' => function () { return Address::factory(1)->createOne()->id; },
                    // 'plan_id' => function () { return Plan::factory(1)->createOne()->id; }
                    // 'plan_id' => function () { return Plan::pluck('id')->random(); }
                ];})
                ->create();
    }
}
