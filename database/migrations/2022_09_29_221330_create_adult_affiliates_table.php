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
        Schema::create('adult_affiliates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('surname');
            $table->date('birthdate');
            $table->mediumInteger('DNI')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->integer('phone_number')->nullable();
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('way_to_pay');
            $table->string('location');
            $table->string('province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adult_affiliates');
    }
};
