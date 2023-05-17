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
        Schema::create('air_ex_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_master_id')->references('id')->on('job_masters')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('job_no', 20)->unique();
            $table->string('smawb_no', 30)->nullable();
            $table->string('booking_no', 20)->nullable();
            $table->boolean('nomination_flag')->nullable();
            $table->boolean('bank')->nullable();
            $table->string('awb_prefix', 10)->nullable();
            $table->string('shipper_acc_no', 15)->nullable();
            $table->string('consignee_acc_no', 15)->nullable();
            $table->string('notify_code', 10)->nullable();
            $table->string('notify_name', 100)->nullable();
            $table->string('notify_address_1', 50)->nullable();
            $table->string('notify_address_2', 50)->nullable();
            $table->string('notify_address_3', 50)->nullable();
            $table->string('notify_address_4', 50)->nullable();
            $table->string('agent_code', 10)->nullable();
            $table->string('agent_name', 100)->nullable();
            $table->string('agent_iata_code', 30)->nullable();
            $table->string('agent_acc_no', 30)->nullable();
            $table->text('note')->nullable();
            $table->double('vol_wt_ratio')->nullable();
            $table->boolean('round_up')->nullable();
            $table->string('kg_lb_flag', 10)->nullable();
            $table->double('no_high_pallet')->nullable();
            $table->double('no_low_pallet')->nullable();
            $table->double('no_container')->nullable();
            $table->string('satuan_dimension', 5)->nullable();
            $table->double('total_m3')->nullable();
            $table->double('total_pcs')->nullable();
            $table->double('total_dimension')->nullable();
            $table->double('total_vol_wt')->nullable();
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
        Schema::dropIfExists('air_ex_jobs');
    }
};
