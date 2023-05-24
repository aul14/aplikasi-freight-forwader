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
        Schema::create('air_im_job_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_im_job_id')->references('id')->on('air_im_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('air_dept_code', 50)->nullable();
            $table->string('air_dept_name', 100)->nullable();
            $table->string('air_dest_code', 50)->nullable();
            $table->string('air_dest_name', 100)->nullable();
            $table->string('flight_no', 12)->nullable();
            $table->dateTime('flight_date_1')->nullable();
            $table->string('route_1', 50)->nullable();
            $table->string('flight_no_1', 12)->nullable();
            $table->date('etd_1')->nullable();
            $table->date('eta_1')->nullable();
            $table->string('route_2', 50)->nullable();
            $table->string('flight_no_2', 12)->nullable();
            $table->date('etd_2')->nullable();
            $table->date('eta_2')->nullable();
            $table->string('route_3', 50)->nullable();
            $table->string('flight_no_3', 12)->nullable();
            $table->date('etd_3')->nullable();
            $table->date('eta_3')->nullable();
            $table->dateTime('arrival_date_time')->nullable();
            $table->double('declare_val_carriage')->nullable();
            $table->double('declare_val_custom')->nullable();
            $table->string('curr_code', 5)->nullable();
            $table->string('commodity_code', 15)->nullable();
            $table->string('commodity_name', 50)->nullable();
            $table->string('weight_val_flag', 10)->nullable();
            $table->string('bill_party_code_1', 10)->nullable();
            $table->string('bill_party_name_1', 80)->nullable();
            $table->string('other_val_flag', 10)->nullable();
            $table->string('bill_party_code_2', 10)->nullable();
            $table->string('bill_party_name_2', 80)->nullable();
            $table->double('pcs')->nullable();
            $table->string('uom_code', 10)->nullable();
            $table->double('gross_weight')->nullable();
            $table->double('volume_weight')->nullable();
            $table->string('kg_lb', 5)->nullable();
            $table->string('rate_class', 20)->nullable();
            $table->double('charge_weight')->nullable();
            $table->double('iata_rate')->nullable();
            $table->double('iata_total_amt')->nullable();
            $table->double('weight_charge_pp')->nullable();
            $table->double('value_charge_pp')->nullable();
            $table->double('tax_pp')->nullable();
            $table->double('agent_pp')->nullable();
            $table->double('carrier_pp')->nullable();
            $table->double('total_pp')->nullable();
            $table->double('weight_charge_cc')->nullable();
            $table->double('value_charge_cc')->nullable();
            $table->double('tax_cc')->nullable();
            $table->double('agent_cc')->nullable();
            $table->double('carrier_cc')->nullable();
            $table->double('total_cc')->nullable();
            $table->string('permit_no')->nullable();
            $table->date('permit')->nullable();
            $table->string('collect_curr', 5)->nullable();
            $table->double('curr_rate')->nullable();
            $table->double('curr_markup_rate')->nullable();
            $table->double('final_rate')->nullable();
            $table->double('final_amt')->nullable();
            $table->double('local_amt')->nullable();
            $table->double('cc_fee_percent')->nullable();
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
        Schema::dropIfExists('air_im_job_d1');
    }
};
