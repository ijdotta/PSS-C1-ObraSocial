<?php

namespace Database\Factories;

use App\Models\AdultAffiliate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefit>
 */
class BenefitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $uuid = fake()->uuid();

        $jpg_path = 'order_'.$uuid.'.jpg';
        Storage::put($jpg_path, '1010101010');

        $pdf_path = 'history_'.$uuid.'.pdf';
        Storage::put($pdf_path, 'historia clinica');

        return [
            'adult_affiliate_id' => AdultAffiliate::pluck('id')->first(),
            'provider' => 'Dr. Curetta',
            'service_date' => fake()->date(),
            'path_to_medical_order' => $jpg_path,
            'path_to_medical_history' => $pdf_path,
            'comment' => fake()->text(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
