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
        Schema::create('sea_quotation_d2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_quotation_id')->nullable();
            $table->string('item_code_d2', 50)->nullable();
            $table->string('item_desc_d2', 100)->nullable();
            $table->double('qty_d2')->nullable();
            $table->string('cargo_d2', 5)->nullable();
            $table->string('dg_d2', 5)->nullable();
            $table->string('uom_d2', 50)->nullable();
            $table->boolean('chg_d2')->nullable();
            $table->string('vat_code_d2', 50)->nullable();
            $table->string('p_c_d2', 5)->nullable();
            $table->string('chg_unit_d2', 100)->nullable();
            $table->string('container_d2', 50)->nullable();
            $table->string('rate_d2', 50)->nullable();
            $table->string('currency_d2', 50)->nullable();
            $table->double('min_amt_d2')->nullable();
            $table->double('amt_d2')->nullable();
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
        Schema::dropIfExists('sea_quotation_d2');
    }
};
