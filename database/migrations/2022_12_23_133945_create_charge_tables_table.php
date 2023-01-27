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
        Schema::create('charge_tables', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('description', 50)->nullable();
            $table->foreignId('job_type_id')->nullable();
            $table->double('transit_time')->nullable();
            $table->string('frequency', 50)->nullable();
            $table->foreignId('bisnis_party_id')->nullable();
            $table->string('port_loading_code', 50)->nullable();
            $table->string('port_loading_name', 100)->nullable();
            $table->string('port_discharge_code', 50)->nullable();
            $table->string('port_discharge_name', 100)->nullable();
            $table->foreignId('city_id')->nullable();
            $table->boolean('valid_flag')->nullable();
            $table->boolean('standard_flag')->nullable();
            $table->boolean('frt_collect')->nullable();
            $table->string('via_port_code', 50)->nullable();
            $table->string('via_port_name', 100)->nullable();
            $table->string('second_port_code', 50)->nullable();
            $table->string('second_port_name', 100)->nullable();
            $table->date('effective_date')->nullable();
            $table->date('exp_date')->nullable();
            $table->text('note')->nullable();
            $table->string('note_code', 5)->nullable();
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
        Schema::dropIfExists('charge_tables');
    }
};
