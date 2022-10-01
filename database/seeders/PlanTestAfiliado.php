<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanTestAfiliado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan1 = new Plan();
        $plan1->name='planA';
        $plan1->save();

        $plan2 = new Plan();
        $plan2->name='planB';
        $plan2->save();

        $plan3 = new Plan();
        $plan3->name='planC';
        $plan3->save();
    }
}
