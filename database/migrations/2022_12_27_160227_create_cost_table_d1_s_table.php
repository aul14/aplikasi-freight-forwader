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
        Schema::create('cost_table_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cost_table_id');
            $table->foreignId('charge_code_id')->nullable();
            $table->double('qty')->nullable();
            $table->string('cargo', 5)->nullable();
            $table->string('dg', 5)->nullable();
            $table->foreignId('uom_id')->nullable();
            $table->boolean('chg')->nullable();
            $table->foreignId('vat_code_id')->nullable();
            $table->string('p_c', 5)->nullable();
            $table->string('chg_unit', 100)->nullable();
            $table->foreignId('container_id')->nullable();
            $table->string('rate', 50)->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->double('min_amt')->nullable();
            $table->double('amt')->nullable();
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
        Schema::dropIfExists('cost_table_d1');
    }
};
