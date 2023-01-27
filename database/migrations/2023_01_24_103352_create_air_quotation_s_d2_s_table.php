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
        Schema::create('air_quotation_s_d2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_quotation_id')->nullable();
            $table->string('air_quotation_d1_code', 25)->nullable();
            $table->string('item_code_s_d2', 50)->nullable();
            $table->string('item_desc_s_d2', 100)->nullable();
            $table->double('qty_s_d2')->nullable();
            $table->string('awb_code_s_d2', 50)->nullable();
            $table->string('uom_s_d2', 50)->nullable();
            $table->boolean('chg_s_d2')->nullable();
            $table->string('vat_code_s_d2', 50)->nullable();
            $table->string('p_c_s_d2', 5)->nullable();
            $table->string('due_s_d2', 15)->nullable();
            $table->string('chg_unit_s_d2', 100)->nullable();
            $table->string('rate_s_d2', 50)->nullable();
            $table->string('currency_s_d2', 50)->nullable();
            $table->double('curr_rate_s_d2')->nullable();
            $table->double('min_amt_s_d2')->nullable();
            $table->double('amt_s_d2')->nullable();
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
        Schema::dropIfExists('air_quotation_s_d2');
    }
};
