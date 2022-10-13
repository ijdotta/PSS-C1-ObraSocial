<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BenefitStates;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adult_affiliate_id');
            $table->string('provider');
            $table->date('service_date');
            $table->string('path_to_medical_order');
            $table->string('path_to_medical_history')->nullable();
            $table->text('comment')->nullable();
            $table->string('state')->default(BenefitStates::REQUESTED->name);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefits');
    }
};
