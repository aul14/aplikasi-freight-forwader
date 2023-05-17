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
        Schema::create('sea_im_job_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_im_job_id')->references('id')->on('sea_im_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('collect_from_code', 10)->nullable();
            $table->string('collect_from_name', 100)->nullable();
            $table->string('collect_from_address_1', 50)->nullable();
            $table->string('collect_from_address_2', 50)->nullable();
            $table->string('collect_from_address_3', 50)->nullable();
            $table->string('collect_from_address_4', 50)->nullable();
            $table->string('delivery_to_code', 10)->nullable();
            $table->string('delivery_to_name', 100)->nullable();
            $table->string('delivery_to_address_1', 50)->nullable();
            $table->string('delivery_to_address_2', 50)->nullable();
            $table->string('delivery_to_address_3', 50)->nullable();
            $table->string('delivery_to_address_4', 50)->nullable();
            $table->string('transport_company_code', 10)->nullable();
            $table->string('transport_company_name', 100)->nullable();
            $table->string('transport_company_address_1', 50)->nullable();
            $table->string('transport_company_address_2', 50)->nullable();
            $table->string('transport_company_address_3', 50)->nullable();
            $table->string('transport_company_address_4', 50)->nullable();
            $table->string('transport_company_contact_name', 50)->nullable();
            $table->string('transport_company_telp', 30)->nullable();
            $table->string('transport_company_fax', 30)->nullable();
            $table->string('cr_no', 15)->nullable();
            $table->string('vehicle_no', 15)->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->string('driver_code', 15)->nullable();
            $table->string('driver_name', 50)->nullable();
            $table->string('driver_contact_1', 30)->nullable();
            $table->string('driver_contact_2', 30)->nullable();
            $table->string('delivery_instruction_1', 60)->nullable();
            $table->string('delivery_instruction_2', 60)->nullable();
            $table->string('delivery_instruction_3', 60)->nullable();
            $table->string('delivery_instruction_4', 60)->nullable();
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
        Schema::dropIfExists('sea_im_job_d1');
    }
};
