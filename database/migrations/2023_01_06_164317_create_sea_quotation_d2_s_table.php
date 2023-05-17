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
            $table->string('item_code', 50)->nullable();
            $table->string('item_desc', 100)->nullable();
            $table->double('qty')->nullable();
            $table->string('cargo', 5)->nullable();
            $table->string('dg', 5)->nullable();
            $table->string('uom', 50)->nullable();
            $table->boolean('chg')->nullable();
            $table->string('vat_code', 50)->nullable();
            $table->string('p_c', 15)->nullable();
            $table->string('chg_unit', 100)->nullable();
            $table->string('container', 50)->nullable();
            $table->string('rate', 50)->nullable();
            $table->string('currency', 50)->nullable();
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
        Schema::dropIfExists('sea_quotation_d2');
    }
};
