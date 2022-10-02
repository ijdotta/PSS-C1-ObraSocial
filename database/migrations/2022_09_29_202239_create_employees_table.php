<?php

use App\Enums\EmployeeRole;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('role')->default(EmployeeRole::ADMINISTRATIVE->name);
            $table->string('name');
            $table->string('lastname');
            $table->date('date_of_birth');
            $table->string('DNI', 8)->unique();
            $table->string('email')->unique();
            $table->foreignId('address_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->string('phone_number', 14)->nullable();
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
        Schema::dropIfExists('employees');
    }
};
