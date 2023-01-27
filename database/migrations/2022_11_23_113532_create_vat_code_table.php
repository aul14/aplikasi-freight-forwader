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
        Schema::create('vat_code', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('description', 50);
            $table->string('type', 5)->nullable();
            $table->string('sales_cost', 20)->nullable();
            $table->boolean('inclusice')->nullable();
            $table->string('input_ta_code', 50)->nullable();
            $table->string('output_ta_code', 50)->nullable();
            $table->string('paid_in_ta_code', 50)->nullable();
            $table->string('paid_out_ta_code', 50)->nullable();
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
        Schema::dropIfExists('vat_code');
    }
};
