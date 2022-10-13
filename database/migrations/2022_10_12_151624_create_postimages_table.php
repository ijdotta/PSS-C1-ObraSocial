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
        Schema::create('medical_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('reimbursement_id'); 
            $table->foreign('reimbursement_id')->references('id')->on('reimbursements')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicalRequests');
    }
};