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
        Schema::create('sea_booking_d2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_booking_id')->references('id')->on('sea_bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('shipment_type', 10)->nullable();
            $table->string('master_job_no', 20)->nullable();
            $table->dateTime('eta_sub')->nullable();
            $table->date('etd_date')->nullable();
            $table->date('first_via_ata')->nullable();
            $table->date('first_via_eta')->nullable();
            $table->date('first_via_etd')->nullable();
            $table->date('eta')->nullable();
            $table->date('dest_eta_date')->nullable();
            $table->dateTime('close_date_time')->nullable();
            $table->string('place_of_receipt', 50)->nullable();
            $table->string('port_loading_code', 50)->nullable();
            $table->string('port_loading_name', 100)->nullable();
            $table->string('port_discharge_code', 50)->nullable();
            $table->string('port_discharge_name', 100)->nullable();
            $table->string('via_port_code', 50)->nullable();
            $table->string('via_port_name', 100)->nullable();
            $table->string('terminal', 50)->nullable();
            $table->string('place_of_delivery', 50)->nullable();
            $table->string('vessel_code', 50)->nullable();
            $table->string('vessel_name', 100)->nullable();
            $table->string('voyage_no', 20)->nullable();
            $table->string('mother_vessel_name', 20)->nullable();
            $table->string('mother_voyage', 20)->nullable();
            $table->string('shippline_code', 50)->nullable();
            $table->string('shippline_name', 100)->nullable();
            $table->string('shippline_ref_no')->nullable();
            $table->string('coloader_code', 50)->nullable();
            $table->string('coloader_name', 100)->nullable();
            $table->string('coloader_ref_no')->nullable();
            $table->string('stuff_warehouse_code', 50)->nullable();
            $table->string('stuff_warehouse_name', 100)->nullable();
            $table->string('forward_agent_code', 50)->nullable();
            $table->string('forward_agent_name', 100)->nullable();
            $table->string('letter_of_credit', 50)->nullable();
            $table->string('freight', 100)->nullable();
            $table->string('other_charges', 100)->nullable();
            $table->string('shipmode', 20)->nullable();
            $table->string('service_level', 20)->nullable();
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
        Schema::dropIfExists('sea_booking_d2');
    }
};
