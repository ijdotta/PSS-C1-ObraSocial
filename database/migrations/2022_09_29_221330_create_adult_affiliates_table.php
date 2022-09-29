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
            $table->string('sur_name');
            $table->date('date_of_birth');
            $table->mediumInteger('DNI')->unique();
            $table->string('email')->unique();
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('adress');
            $table->integer('phone');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->smallInteger('way_to_pay');
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
