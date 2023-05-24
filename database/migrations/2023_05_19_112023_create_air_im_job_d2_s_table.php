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
        Schema::create('air_im_job_d2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_im_job_id')->references('id')->on('air_im_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('delivery_type_code', 10)->nullable();
            $table->string('delivery_type', 80)->nullable();
            $table->string('trans_company_code', 10)->nullable();
            $table->string('trans_company_name', 100)->nullable();
            $table->string('trans_company_address_1', 50)->nullable();
            $table->string('trans_company_address_2', 50)->nullable();
            $table->string('trans_company_address_3', 50)->nullable();
            $table->string('trans_company_address_4', 50)->nullable();
            $table->dateTime('pickup')->nullable();
            $table->string('collect_code', 10)->nullable();
            $table->string('collect_name', 100)->nullable();
            $table->string('collect_address_1', 50)->nullable();
            $table->string('collect_address_2', 50)->nullable();
            $table->string('collect_address_3', 50)->nullable();
            $table->string('collect_address_4', 50)->nullable();
            $table->dateTime('delivery')->nullable();
            $table->string('delivery_to_code', 10)->nullable();
            $table->string('delivery_to_name', 100)->nullable();
            $table->string('delivery_to_address_1', 50)->nullable();
            $table->string('delivery_to_address_2', 50)->nullable();
            $table->string('delivery_to_address_3', 50)->nullable();
            $table->string('delivery_to_address_4', 50)->nullable();
            $table->string('delivery_ins_1', 60)->nullable();
            $table->string('delivery_ins_2', 60)->nullable();
            $table->string('delivery_ins_3', 60)->nullable();
            $table->string('delivery_ins_4', 60)->nullable();
            $table->string('delivery_ins_5', 60)->nullable();
            $table->string('delivery_ins_6', 60)->nullable();
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
        Schema::dropIfExists('air_im_job_d2');
    }
};
