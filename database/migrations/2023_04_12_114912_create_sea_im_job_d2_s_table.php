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
        Schema::create('sea_im_job_d2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_im_job_id')->references('id')->on('sea_im_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('delivery_type_code', 50)->nullable();
            $table->string('delivery_type', 100)->nullable();
            $table->string('commodity_code', 50)->nullable();
            $table->string('commodity', 100)->nullable();
            $table->string('cargo_class', 50)->nullable();
            $table->boolean('dg_cargo')->nullable();
            $table->string('origin_code', 50)->nullable();
            $table->string('origin_name', 100)->nullable();
            $table->string('dest_code', 50)->nullable();
            $table->string('dest_name', 100)->nullable();
            $table->string('place_of_receipt', 50)->nullable();
            $table->string('port_loading_code', 50)->nullable();
            $table->string('port_loading_name', 100)->nullable();
            $table->string('port_discharge_code', 50)->nullable();
            $table->string('port_discharge_name', 100)->nullable();
            $table->string('via_port_code', 50)->nullable();
            $table->string('via_port_name', 100)->nullable();
            $table->string('place_of_delivery', 50)->nullable();
            $table->string('vessel_code', 50)->nullable();
            $table->string('vessel_name', 100)->nullable();
            $table->string('voyage_no', 20)->nullable();
            $table->string('mother_vessel_name', 50)->nullable();
            $table->string('shippline_code', 50)->nullable();
            $table->string('shippline_name', 100)->nullable();
            $table->string('shippline_ref_no', 50)->nullable();
            $table->string('coloader_code', 50)->nullable();
            $table->string('coloader_name', 100)->nullable();
            $table->string('coloader_ref_no', 20)->nullable();
            $table->double('detention_free_day')->nullable();
            $table->double('demurage_free_day')->nullable();
            $table->string('permit_no')->nullable();
            $table->string('letter_of_credit_no', 50)->nullable();
            $table->string('terminal', 20)->nullable();
            $table->date('etd')->nullable();
            $table->date('first_via_eta')->nullable();
            $table->dateTime('eta')->nullable();
            $table->dateTime('dest_eta')->nullable();
            $table->string('shipmode', 20)->nullable();
            $table->string('service_level', 20)->nullable();
            $table->string('mother_voyage', 20)->nullable();
            $table->string('create_by', 100)->nullable();
            $table->string('update_by', 100)->nullable();
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
        Schema::dropIfExists('sea_im_job_d2');
    }
};
