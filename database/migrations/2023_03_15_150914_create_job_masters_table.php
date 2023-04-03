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
        Schema::create('job_masters', function (Blueprint $table) {
            $table->id();
            $table->string('job_no', 20)->unique();
            $table->date('job_date')->nullable();
            $table->string('job_type', 5)->nullable();
            $table->string('cargo_type', 10)->nullable();
            $table->string('master_job_no', 20)->unique()->nullable();
            $table->string('bl_no', 25)->nullable();
            $table->string('hbl_no', 25)->nullable();
            $table->string('obl_no', 25)->nullable();
            $table->string('shipment_type', 25)->nullable();
            $table->string('customer_code', 20)->nullable();
            $table->string('customer', 100)->nullable();
            $table->string('reference_no', 50)->nullable();
            $table->string('salesman_code', 20)->nullable();
            $table->string('salesman', 100)->nullable();
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
            $table->string('coloader_code', 50)->nullable();
            $table->string('coloader_name', 100)->nullable();
            $table->string('delivery_agent_code', 10)->nullable();
            $table->string('delivery_agent_name', 100)->nullable();
            $table->string('delivery_agent_address_1', 50)->nullable();
            $table->string('delivery_agent_address_2', 50)->nullable();
            $table->string('delivery_agent_address_3', 50)->nullable();
            $table->string('delivery_agent_address_4', 50)->nullable();
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
        Schema::dropIfExists('job_masters');
    }
};
