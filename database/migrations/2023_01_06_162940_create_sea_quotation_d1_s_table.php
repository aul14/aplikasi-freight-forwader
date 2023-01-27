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
        Schema::create('sea_quotation_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_quotation_id')->nullable();
            $table->string('code', 25)->unique()->nullable();
            $table->string('port_loading_code', 50)->nullable();
            $table->string('port_loading_name', 100)->nullable();
            $table->string('port_discharge_code', 50)->nullable();
            $table->string('port_discharge_name', 100)->nullable();
            $table->string('via_port_code', 50)->nullable();
            $table->string('via_port_name', 100)->nullable();
            $table->string('second_port_code', 50)->nullable();
            $table->string('second_port_name', 100)->nullable();
            $table->string('third_port_code', 50)->nullable();
            $table->string('third_port_name', 100)->nullable();
            $table->string('shipping_line_code', 50)->nullable();
            $table->string('shipping_line_name', 100)->nullable();
            $table->double('transit_time')->nullable();
            $table->string('frequency', 50)->nullable();
            $table->string('note_code', 5)->nullable();
            $table->text('note')->nullable();
            $table->string('origin_code', 50)->nullable();
            $table->string('origin_name', 100)->nullable();
            $table->string('dest_code', 50)->nullable();
            $table->string('dest_name', 100)->nullable();
            $table->boolean('frt_collect')->nullable();
            $table->string('commodity_code', 50)->nullable();
            $table->string('commodity_name', 100)->nullable();
            $table->string('delivery_type', 50)->nullable();
            $table->string('delivery_name', 100)->nullable();
            $table->double('total_amt')->nullable();
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
        Schema::dropIfExists('sea_quotation_d1');
    }
};
