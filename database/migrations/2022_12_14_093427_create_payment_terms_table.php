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
        Schema::create('payment_term', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->unique();
            $table->string('description', 50)->nullable();
            $table->double('net_days')->nullable();
            $table->boolean('net_date')->nullable();
            $table->double('discount_days')->nullable();
            $table->boolean('discount_date')->nullable();
            $table->double('discount_percent')->nullable();
            $table->boolean('shipment_date_flag')->nullable();
            $table->double('service_charge_min')->nullable();
            $table->double('service_charge_percent')->nullable();
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
        Schema::dropIfExists('payment_term');
    }
};
