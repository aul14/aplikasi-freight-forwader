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
        Schema::create('charge_code', function (Blueprint $table) {
            $table->id();
            $table->string('item_code', 30)->unique();
            $table->string('item_description', 50)->nullable();
            $table->foreignId('job_type_id')->nullable();
            $table->string('dept_code', 50)->nullable();
            $table->string('sales_acc_code', 50)->nullable();
            $table->string('cost_acc_code', 50)->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->foreignId('uom_id')->nullable();
            $table->foreignId('wt_code_id')->nullable();
            $table->double('cost_ammount')->nullable();
            $table->double('cost_percent')->nullable();
            $table->boolean('recoverable')->nullable();
            $table->string('split_by_method', 50)->nullable();
            $table->string('charge_unit', 100)->nullable();
            $table->string('cost_center_code', 100)->nullable();
            $table->foreignId('vat_code_id')->nullable();
            $table->string('cost_code')->nullable();
            $table->text('cost_code_desc')->nullable();
            $table->boolean('lock')->nullable();
            $table->string('sales_cost', 50)->nullable();
            $table->string('site_code', 20)->nullable();
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
        Schema::dropIfExists('charge_code');
    }
};
