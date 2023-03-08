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
        Schema::create('sea_booking_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_booking_id')->references('id')->on('sea_bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('agent_code', 10)->nullable();
            $table->string('agent_name', 100)->nullable();
            $table->string('agent_address_1', 50)->nullable();
            $table->string('agent_address_2', 50)->nullable();
            $table->string('agent_address_3', 50)->nullable();
            $table->string('agent_address_4', 50)->nullable();
            $table->string('shipper_code', 10)->nullable();
            $table->string('shipper_name', 100)->nullable();
            $table->string('shipper_address_1', 50)->nullable();
            $table->string('shipper_address_2', 50)->nullable();
            $table->string('shipper_address_3', 50)->nullable();
            $table->string('shipper_address_4', 50)->nullable();
            $table->string('consignee_code', 10)->nullable();
            $table->string('consignee_name', 100)->nullable();
            $table->string('consignee_address_1', 50)->nullable();
            $table->string('consignee_address_2', 50)->nullable();
            $table->string('consignee_address_3', 50)->nullable();
            $table->string('consignee_address_4', 50)->nullable();
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
        Schema::dropIfExists('sea_booking_d1');
    }
};
