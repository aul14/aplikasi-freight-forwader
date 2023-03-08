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
        Schema::create('sea_booking_d3', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_booking_id')->references('id')->on('sea_bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('principle_agent_code', 20)->nullable();
            $table->string('shippagent_code', 50)->nullable();
            $table->string('scn_code', 10)->nullable();
            $table->string('stuff_agent_code', 50)->nullable();
            $table->string('stuff_agent_name', 50)->nullable();
            $table->string('stuff_agent_address_1', 50)->nullable();
            $table->string('stuff_agent_address_2', 50)->nullable();
            $table->string('stuff_agent_address_3', 50)->nullable();
            $table->string('stuff_agent_address_4', 50)->nullable();
            $table->string('stuff_agent_contact_name', 50)->nullable();
            $table->dateTime('stuff')->nullable();
            $table->string('smk_code', 20)->nullable();
            $table->dateTime('close_date_time_d3')->nullable();
            $table->dateTime('cargo_receipt')->nullable();
            $table->string('yard_code', 10)->nullable();
            $table->string('yard_name', 100)->nullable();
            $table->string('yard_address_1', 50)->nullable();
            $table->string('yard_address_2', 50)->nullable();
            $table->string('yard_address_3', 50)->nullable();
            $table->string('yard_address_4', 50)->nullable();
            $table->string('depot_code', 10)->nullable();
            $table->string('depot_name', 100)->nullable();
            $table->string('depot_address_1', 50)->nullable();
            $table->string('depot_address_2', 50)->nullable();
            $table->string('depot_address_3', 50)->nullable();
            $table->string('depot_address_4', 50)->nullable();
            $table->string('depot_instruction_1', 60)->nullable();
            $table->string('depot_instruction_2', 60)->nullable();
            $table->string('depot_instruction_3', 60)->nullable();
            $table->string('depot_instruction_4', 60)->nullable();
            $table->string('instruction_1', 80)->nullable();
            $table->string('instruction_2', 80)->nullable();
            $table->string('instruction_3', 80)->nullable();
            $table->string('instruction_4', 80)->nullable();
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
        Schema::dropIfExists('sea_booking_d3');
    }
};
