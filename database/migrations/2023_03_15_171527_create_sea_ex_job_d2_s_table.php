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
        Schema::create('sea_ex_job_d2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_ex_job_id')->references('id')->on('sea_ex_jobs')->cascadeOnUpdate()->cascadeOnDelete();
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
            $table->string('smk_code', 20)->nullable();
            $table->dateTime('stuff')->nullable();
            $table->dateTime('close_date_time')->nullable();
            $table->dateTime('trucking')->nullable();
            $table->date('billing')->nullable();
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
        Schema::dropIfExists('sea_ex_job_d2');
    }
};
