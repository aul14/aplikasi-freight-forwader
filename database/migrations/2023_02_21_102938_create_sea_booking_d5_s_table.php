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
        Schema::create('sea_booking_d5', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_booking_id')->references('id')->on('sea_bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('fumigation_code', 10)->nullable();
            $table->string('fumigation_name', 100)->nullable();
            $table->string('fumigation_address_1', 50)->nullable();
            $table->string('fumigation_address_2', 50)->nullable();
            $table->string('fumigation_address_3', 50)->nullable();
            $table->string('fumigation_address_4', 50)->nullable();
            $table->string('fumigation_contact_name', 50)->nullable();
            $table->dateTime('stumping_date_time')->nullable();
            $table->dateTime('fumigation_date_time')->nullable();
            $table->dateTime('ventilation_date_time')->nullable();
            $table->dateTime('ava_date_time')->nullable();
            $table->string('fumigation_instruction_1', 80)->nullable();
            $table->string('fumigation_instruction_2', 80)->nullable();
            $table->string('fumigation_instruction_3', 80)->nullable();
            $table->string('fumigation_instruction_4', 80)->nullable();
            $table->string('fumigation_instruction_5', 80)->nullable();
            $table->string('fumigation_instruction_6', 80)->nullable();
            $table->string('fumigation_instruction_7', 80)->nullable();
            $table->string('fumigation_instruction_8', 80)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_booking_d5');
    }
};
