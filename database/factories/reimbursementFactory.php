<?php

namespace Database\Factories;

use App\Models\AdultAffiliate;
use App\Models\ClinicHistory;
use App\Models\Invoice;
use App\Models\MedicalRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class reimbursementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $adult_affiliate_id = AdultAffiliate::pluck('id')->first();
        $uuid = fake()->uuid();

        $jpg_path = 'invoice_'.$uuid.'.jpg';
        Storage::put($jpg_path, '1010101010');
        $invoice = new Invoice();
        $invoice['reimbursement_id'] = $uuid;
        $invoice['image'] = $jpg_path;
        $invoice->save();

        $pdf_path = 'history_'.$uuid.'.pdf';
        Storage::put($pdf_path, 'historia clinica');
        $clinical_history = new ClinicHistory();
        $clinical_history['adult_affiliate_id'] = $adult_affiliate_id;
        $clinical_history['file'] = $pdf_path;
        $clinical_history->save();

        $jpg_path = 'medical_request'.$uuid.'.jpg';
        Storage::put($jpg_path, '1010101010');
        $medical_request = new MedicalRequest();
        $medical_request['adult_affiliate_id'] = $adult_affiliate_id;
        $medical_request['image'] = $jpg_path;
        $medical_request->save();


        return [
            'id' => $uuid,
            'adult_affiliate_id' => $adult_affiliate_id,
            'cuit_cuil' => rand(20111111110, 20999999999),
            'service_date' => fake()->date(),
            'comment' => fake()->text(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
