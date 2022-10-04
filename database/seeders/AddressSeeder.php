<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'street' => 'TEST',
            'number' => '123',
            'city' => 'TESTLAND',
            'province' => 'TESTICLES',
        ]);
    }
}
