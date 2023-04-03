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
        Schema::create('sea_ex_job_d5', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_ex_job_id')->references('id')->on('sea_ex_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('code', 30)->nullable();
            $table->string('description', 50)->nullable();
            $table->double('qty_sales')->nullable();
            $table->double('unit_rate_sales')->nullable();
            $table->string('uom_sales', 50)->nullable();
            $table->string('pc_sales', 10)->nullable();
            $table->string('cust_code_sales', 20)->nullable();
            $table->string('cust_name_sales', 100)->nullable();
            $table->string('vat_sales', 10)->nullable();
            $table->string('curr_sales', 10)->nullable();
            $table->double('rate_sales')->nullable();
            $table->double('amt_sales')->nullable();
            $table->double('sales')->nullable();
            $table->double('qty_vendor')->nullable();
            $table->double('unit_rate_vendor')->nullable();
            $table->string('uom_vendor', 50)->nullable();
            $table->string('pc_vendor', 10)->nullable();
            $table->string('code_vendor', 20)->nullable();
            $table->string('name_vendor', 100)->nullable();
            $table->string('vat_vendor', 10)->nullable();
            $table->string('curr_vendor', 10)->nullable();
            $table->double('rate_vendor')->nullable();
            $table->double('amt_vendor')->nullable();
            $table->double('cost')->nullable();
            $table->string('create_by', 100)->nullable();
            $table->string('update_by', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_ex_job_d5');
    }
};
