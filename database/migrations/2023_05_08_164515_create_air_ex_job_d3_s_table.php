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
        Schema::create('air_ex_job_d3', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_ex_job_id')->references('id')->on('air_ex_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('pcs')->nullable();
            $table->string('uom', 5)->nullable();
            $table->double('gross_weight')->nullable();
            $table->string('rate_class', 50)->nullable();
            $table->string('commodity_code', 10)->nullable();
            $table->double('chargeable_wt')->nullable();
            $table->double('doc_rate')->nullable();
            $table->double('doc_total_amt')->nullable();
            $table->double('slac_qty')->nullable();
            $table->string('slac_uom', 5)->nullable();
            $table->string('cargo_class', 5)->nullable();
            $table->string('salesman_code', 20)->nullable();
            $table->boolean('as_arrange_flag')->nullable();
            $table->string('commodity_desc_1', 50)->nullable();
            $table->string('commodity_desc_2', 50)->nullable();
            $table->string('commodity_desc_3', 50)->nullable();
            $table->string('commodity_desc_4', 50)->nullable();
            $table->string('commodity_desc_5', 50)->nullable();
            $table->string('commodity_desc_6', 50)->nullable();
            $table->string('commodity_desc_7', 50)->nullable();
            $table->string('commodity_desc_8', 50)->nullable();
            $table->string('commodity_desc_9', 50)->nullable();
            $table->string('commodity_desc_10', 50)->nullable();
            $table->string('commodity_desc_11', 50)->nullable();
            $table->string('commodity_desc_12', 50)->nullable();
            $table->string('desc_1', 50)->nullable();
            $table->string('desc_2', 50)->nullable();
            $table->string('desc_3', 50)->nullable();
            $table->string('desc_4', 50)->nullable();
            $table->string('desc_5', 50)->nullable();
            $table->string('desc_6', 50)->nullable();
            $table->string('desc_7', 50)->nullable();
            $table->string('desc_8', 50)->nullable();
            $table->string('desc_9', 50)->nullable();
            $table->string('desc_10', 50)->nullable();
            $table->string('desc_11', 50)->nullable();
            $table->string('desc_12', 50)->nullable();
            $table->double('user_charge_wt')->nullable();
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
        Schema::dropIfExists('air_ex_job_d3');
    }
};
