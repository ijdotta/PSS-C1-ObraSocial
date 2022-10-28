<?php

namespace Database\Seeders;

use App\Models\reimbursement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReimbursementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        reimbursement::factory(10)->create();
    }
}
