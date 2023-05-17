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
        Schema::create('sea_im_job_d3', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_im_job_id')->references('id')->on('sea_im_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('principle_agent_code', 20)->nullable();
            $table->string('shippagent_code', 50)->nullable();
            $table->string('scn_code', 10)->nullable();
            $table->string('smk_code', 20)->nullable();
            $table->string('cfs_warehouse_code', 50)->nullable();
            $table->string('cfs_warehouse_name', 100)->nullable();
            $table->string('cfs_warehouse_address_1', 50)->nullable();
            $table->string('cfs_warehouse_address_2', 50)->nullable();
            $table->string('cfs_warehouse_address_3', 50)->nullable();
            $table->string('cfs_warehouse_address_4', 50)->nullable();
            $table->string('cfs_warehouse_contact', 50)->nullable();
            $table->dateTime('unstuff')->nullable();
            $table->dateTime('billing')->nullable();
            $table->dateTime('truck_in')->nullable();
            $table->dateTime('truck_out')->nullable();
            $table->dateTime('empty_container')->nullable();
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
            $table->string('depot_instruction_1', 50)->nullable();
            $table->string('depot_instruction_2', 50)->nullable();
            $table->string('depot_instruction_3', 50)->nullable();
            $table->string('depot_instruction_4', 50)->nullable();
            $table->string('instruction_1', 50)->nullable();
            $table->string('instruction_2', 50)->nullable();
            $table->string('instruction_3', 50)->nullable();
            $table->string('instruction_4', 50)->nullable();
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
        Schema::dropIfExists('sea_im_job_d3');
    }
};
