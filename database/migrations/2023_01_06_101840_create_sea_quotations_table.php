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
        Schema::create('sea_quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->nullable();
            $table->foreignId('payment_term_id')->nullable();
            $table->string('sea_quot_no', 15)->unique();
            $table->double('jml_container_type_1')->nullable();
            $table->string('container_type_1', 10)->nullable();
            $table->double('jml_container_type_2')->nullable();
            $table->string('container_type_2', 10)->nullable();
            $table->double('jml_container_type_3')->nullable();
            $table->string('container_type_3', 10)->nullable();
            $table->double('jml_container_type_4')->nullable();
            $table->string('container_type_4', 10)->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_quotations');
    }
};
