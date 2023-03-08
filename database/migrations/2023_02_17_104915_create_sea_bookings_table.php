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
        Schema::create('sea_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('cargo_type', 10)->nullable();
            $table->string('quotation_no', 30)->nullable();
            $table->string('job_no', 50)->unique()->nullable();
            $table->string('job_type', 10)->nullable();
            $table->string('import_job_no', 20)->nullable();
            $table->dateTime('booking_date')->nullable();
            $table->date('job_date')->nullable();
            $table->string('bl_no', 25)->nullable();
            $table->boolean('nomination_cargo')->nullable();
            $table->boolean('railing')->nullable();
            $table->boolean('refeer_container')->nullable();
            $table->string('code_customer', 20)->nullable();
            $table->string('customer', 100)->nullable();
            $table->string('reference_no', 50)->nullable();
            $table->string('contact_name', 50)->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('email')->nullable();
            $table->double('jml_container_type_1')->nullable();
            $table->string('container_type_1', 10)->nullable();
            $table->double('jml_container_type_2')->nullable();
            $table->string('container_type_2', 10)->nullable();
            $table->double('jml_container_type_3')->nullable();
            $table->string('container_type_3', 10)->nullable();
            $table->double('jml_container_type_4')->nullable();
            $table->string('container_type_4', 10)->nullable();
            $table->date('etd')->nullable();
            $table->date('dest_eta')->nullable();
            $table->string('cargo_class')->nullable();
            $table->string('salesman_code', 20)->nullable();
            $table->string('salesman', 100)->nullable();
            $table->string('origin_code', 50)->nullable();
            $table->string('origin_name', 100)->nullable();
            $table->string('dest_code', 50)->nullable();
            $table->string('dest_name', 100)->nullable();
            $table->string('country_code', 50)->nullable();
            $table->string('country_name', 100)->nullable();
            $table->string('country_origin', 100)->nullable();
            $table->boolean('dg_cargo')->nullable();
            $table->string('delivery_type_code', 50)->nullable();
            $table->string('delivery_type', 150)->nullable();
            $table->string('commodity_code', 50)->nullable();
            $table->string('commodity', 150)->nullable();
            $table->double('total_pcs')->nullable();
            $table->string('uom_code', 50)->nullable();
            $table->string('uom', 150)->nullable();
            $table->double('total_gross')->nullable();
            $table->double('total_volume')->nullable();
            $table->string('footer_1', 150)->nullable();
            $table->string('footer_2', 150)->nullable();
            $table->string('footer_3', 150)->nullable();
            $table->string('footer_4', 150)->nullable();
            $table->string('footer_5', 150)->nullable();
            $table->string('footer_6', 150)->nullable();
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
        Schema::dropIfExists('sea_bookings');
    }
};
