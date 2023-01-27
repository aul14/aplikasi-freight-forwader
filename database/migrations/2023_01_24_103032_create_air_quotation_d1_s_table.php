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
        Schema::create('air_quotation_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_quotation_id')->nullable();
            $table->string('code', 25)->unique()->nullable();
            $table->string('air_dept_code', 20)->nullable();
            $table->string('air_dept_name', 100)->nullable();
            $table->string('air_dest_code', 20)->nullable();
            $table->string('air_dest_name', 100)->nullable();
            $table->string('service_level', 50)->nullable();
            $table->string('airline_id', 5)->nullable();
            $table->string('flight_no', 10)->nullable();
            $table->double('transit_time')->nullable();
            $table->string('frequency', 50)->nullable();
            $table->string('sales_item_code', 20)->nullable();
            $table->string('sales_item_name', 100)->nullable();
            $table->string('currency_d1', 10)->nullable();
            $table->string('weight_type', 10)->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('air_quotation_d1');
    }
};
