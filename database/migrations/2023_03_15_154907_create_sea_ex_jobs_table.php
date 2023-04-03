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
        Schema::create('sea_ex_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_master_id')->references('id')->on('job_masters')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('job_no', 20)->unique();
            $table->string('booking_no', 20)->nullable();
            $table->string('quotation_no', 20)->nullable();
            $table->double('no_of_original_bl')->nullable();
            $table->boolean('bl_surrendered')->nullable();
            $table->boolean('bl_attach')->nullable();
            $table->string('notify_code', 10)->nullable();
            $table->string('notify_name', 100)->nullable();
            $table->string('notify_address_1', 50)->nullable();
            $table->string('notify_address_2', 50)->nullable();
            $table->string('notify_address_3', 50)->nullable();
            $table->string('notify_address_4', 50)->nullable();
            $table->string('freight', 20)->nullable();
            $table->double('total_pcs')->nullable();
            $table->string('uom_code', 30)->nullable();
            $table->double('total_gross')->nullable();
            $table->double('total_volume')->nullable();
            $table->text('billing_instruction')->nullable();
            $table->text('job_costing_remark')->nullable();
            $table->double('total_sales')->nullable();
            $table->double('total_cost')->nullable();
            $table->double('profit_loss')->nullable();
            $table->string('margin', 20)->nullable();
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
        Schema::dropIfExists('sea_ex_jobs');
    }
};
