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
        Schema::create('sea_im_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_master_id')->references('id')->on('job_masters')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('job_no', 20)->unique();
            $table->boolean('do_ready')->nullable();
            $table->string('do_ready_remark', 50)->nullable();
            $table->boolean('nomination_cargo')->nullable();
            $table->boolean('telex_release')->nullable();
            $table->boolean('transhipment')->nullable();
            $table->string('frt_pp_cc', 10)->nullable();
            $table->string('notify_code', 10)->nullable();
            $table->string('notify_name', 100)->nullable();
            $table->string('notify_address_1', 50)->nullable();
            $table->string('notify_address_2', 50)->nullable();
            $table->string('notify_address_3', 50)->nullable();
            $table->string('notify_address_4', 50)->nullable();
            $table->string('customer_contact', 50)->nullable();
            $table->string('consignee_contact', 50)->nullable();
            $table->string('consignee_telp', 30)->nullable();
            $table->string('consignee_postal_code', 10)->nullable();
            $table->string('footer_1', 80)->nullable();
            $table->string('footer_2', 80)->nullable();
            $table->string('footer_3', 80)->nullable();
            $table->string('footer_4', 80)->nullable();
            $table->string('footer_5', 80)->nullable();
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
        Schema::dropIfExists('sea_im_jobs');
    }
};
