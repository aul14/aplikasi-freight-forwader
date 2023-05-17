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
        Schema::create('air_ex_job_d2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_ex_job_id')->references('id')->on('air_ex_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('pcs_rcp')->nullable();
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('dimension')->nullable();
            $table->double('sum_m3')->nullable();
            $table->double('sum_volwt')->nullable();
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
        Schema::dropIfExists('air_ex_job_d2');
    }
};
