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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('sea_quot_no', 15)->unique()->nullable();
            $table->string('air_quot_no', 15)->unique()->nullable();
            $table->string('title', 100)->nullable();
            $table->date('effective_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->double('validity_day')->nullable();
            $table->foreignId('quotation_type_id')->nullable();
            $table->foreignId('job_type_id')->nullable();
            $table->foreignId('bisnis_party_id')->nullable();
            $table->string('address_1', 50)->nullable();
            $table->string('address_2', 50)->nullable();
            $table->string('address_3', 50)->nullable();
            $table->string('address_4', 50)->nullable();
            $table->string('contact_name', 50)->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('email')->nullable();
            $table->foreignId('salesman_id')->nullable();
            $table->string('salesman_code', 100)->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->double('curr_rate')->nullable();
            $table->foreignId('delivery_type_id')->nullable();
            $table->string('reference_no', 50)->nullable();
            $table->foreignId('commodity_id')->nullable();
            $table->double('pcs')->nullable();
            $table->foreignId('uom_id')->nullable();
            $table->double('total_gross')->nullable();
            $table->double('total_volume')->nullable();
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
        Schema::dropIfExists('quotations');
    }
};
