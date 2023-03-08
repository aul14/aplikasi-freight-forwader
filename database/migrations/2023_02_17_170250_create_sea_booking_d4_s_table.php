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
        Schema::create('sea_booking_d4', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_booking_id')->references('id')->on('sea_bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('trans_company_code', 10)->nullable();
            $table->string('trans_company_name', 100)->nullable();
            $table->string('trans_company_address_1', 50)->nullable();
            $table->string('trans_company_address_2', 50)->nullable();
            $table->string('trans_company_address_3', 50)->nullable();
            $table->string('trans_company_address_4', 50)->nullable();
            $table->string('trans_company_contact_name', 50)->nullable();
            $table->string('req_trans_no', 20)->nullable();
            $table->string('vehicle_no', 10)->nullable();
            $table->dateTime('delivery_date_time')->nullable();
            $table->dateTime('pickup_date_time')->nullable();
            $table->string('pickup_date_time_remark', 10)->nullable();
            $table->string('collection_from_code', 10)->nullable();
            $table->string('collection_from_name', 100)->nullable();
            $table->string('collection_address_1', 50)->nullable();
            $table->string('collection_address_2', 50)->nullable();
            $table->string('collection_address_3', 50)->nullable();
            $table->string('collection_address_4', 50)->nullable();
            $table->string('delivery_to_code', 10)->nullable();
            $table->string('delivery_to_name', 100)->nullable();
            $table->string('delivery_address_1', 50)->nullable();
            $table->string('delivery_address_2', 50)->nullable();
            $table->string('delivery_address_3', 50)->nullable();
            $table->string('delivery_address_4', 50)->nullable();
            $table->string('delivery_instruction_1', 50)->nullable();
            $table->string('delivery_instruction_2', 50)->nullable();
            $table->string('delivery_instruction_3', 50)->nullable();
            $table->string('delivery_instruction_4', 50)->nullable();
            $table->string('delivery_instruction_5', 50)->nullable();
            $table->string('delivery_instruction_6', 50)->nullable();
            $table->string('delivery_instruction_7', 50)->nullable();
            $table->string('delivery_instruction_8', 50)->nullable();
            $table->boolean('stuffing')->nullable();
            $table->string('stuffing_remark', 50)->nullable();
            $table->boolean('fumigation')->nullable();
            $table->string('fumigation_remark', 50)->nullable();
            $table->boolean('permit')->nullable();
            $table->string('permit_remark', 50)->nullable();
            $table->boolean('insurance')->nullable();
            $table->string('insurance_remark', 50)->nullable();
            $table->boolean('railing')->nullable();
            $table->string('railing_remark', 50)->nullable();
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
        Schema::dropIfExists('sea_booking_d4');
    }
};
