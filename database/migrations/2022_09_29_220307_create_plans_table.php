<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Esta incompleto, solo esta lo minimo para poder cargar un afiliado mayor de edad **/

        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->smallInteger('state');
            $table->Integer('medical_consultations');
            $table->Integer('home_medical_consultations');
            $table->Integer('online_medical_consultations');
            $table->Integer('hospitalization');
            $table->Integer('general_odontology');
            $table->Integer('orthodontics');
            $table->Integer('dental_prosthetics');
            $table->Integer('dental_implants');
            $table->Integer('kinesiology');
            $table->Integer('psychology');
            $table->Integer('drugs_in_pharmacy');
            $table->Integer('medications_in_hospital');
            $table->Integer('optics');
            $table->Integer('cosmetic_surgeries');
            $table->Integer('clinical_analysis');
            $table->Integer('diagnostic_analysis');
            $table->Integer('price_under_25');
            $table->Integer('price_from_25_to_40');
            $table->Integer('price_from_40_to_60');
            $table->Integer('price_over_60');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
