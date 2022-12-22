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
        Schema::create('charge_code_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('charge_code_id');
            $table->string('module', 10)->nullable();
            $table->string('job_type', 10)->nullable();
            $table->string('sales_acc_code', 50)->nullable();
            $table->text('sales_desc')->nullable();
            $table->string('cost_acc_code', 50)->nullable();
            $table->text('cost_desc')->nullable();
            $table->string('adv_acc_code', 50)->nullable();
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
        Schema::dropIfExists('charge_code_d1');
    }
};
