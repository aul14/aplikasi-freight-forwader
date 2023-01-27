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
        Schema::create('air_quotation_s_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_quotation_id')->nullable();
            $table->string('air_quotation_d1_code', 25)->nullable();
            $table->string('rate_1', 15)->nullable();
            $table->string('scr_1', 15)->nullable();
            $table->double('break_point_1')->nullable();
            $table->double('quote_amt_1')->nullable();
            $table->string('rate_2', 15)->nullable();
            $table->string('scr_2', 15)->nullable();
            $table->double('break_point_2')->nullable();
            $table->double('quote_amt_2')->nullable();
            $table->string('rate_3', 15)->nullable();
            $table->string('scr_3', 15)->nullable();
            $table->double('break_point_3')->nullable();
            $table->double('quote_amt_3')->nullable();
            $table->string('rate_4', 15)->nullable();
            $table->string('scr_4', 15)->nullable();
            $table->double('break_point_4')->nullable();
            $table->double('quote_amt_4')->nullable();
            $table->string('rate_5', 15)->nullable();
            $table->string('scr_5', 15)->nullable();
            $table->double('break_point_5')->nullable();
            $table->double('quote_amt_5')->nullable();
            $table->string('rate_6', 15)->nullable();
            $table->string('scr_6', 15)->nullable();
            $table->double('break_point_6')->nullable();
            $table->double('quote_amt_6')->nullable();
            $table->string('rate_7', 15)->nullable();
            $table->string('scr_7', 15)->nullable();
            $table->double('break_point_7')->nullable();
            $table->double('quote_amt_7')->nullable();
            $table->string('rate_8', 15)->nullable();
            $table->string('scr_8', 15)->nullable();
            $table->double('break_point_8')->nullable();
            $table->double('quote_amt_8')->nullable();
            $table->string('rate_9', 15)->nullable();
            $table->string('scr_9', 15)->nullable();
            $table->double('break_point_9')->nullable();
            $table->double('quote_amt_9')->nullable();
            $table->string('rate_10', 15)->nullable();
            $table->string('scr_10', 15)->nullable();
            $table->double('break_point_10')->nullable();
            $table->double('quote_amt_10')->nullable();
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
        Schema::dropIfExists('air_quotation_s_d1');
    }
};
