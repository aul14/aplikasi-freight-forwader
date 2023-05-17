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
        Schema::create('air_ex_job_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_ex_job_id')->references('id')->on('air_ex_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('air_dept_code', 50)->nullable();
            $table->string('air_dept_name', 100)->nullable();
            $table->string('to_dest_code_1', 10)->nullable();
            $table->string('by_airline_id_1', 10)->nullable();
            $table->string('flight_no_1', 10)->nullable();
            $table->dateTime('flight_date_1')->nullable();
            $table->dateTime('eta_date_1')->nullable();
            $table->string('to_dest_code_2', 10)->nullable();
            $table->string('by_airline_id_2', 10)->nullable();
            $table->string('flight_no_2', 10)->nullable();
            $table->dateTime('flight_date_2')->nullable();
            $table->dateTime('eta_date_2')->nullable();
            $table->string('to_dest_code_3', 10)->nullable();
            $table->string('by_airline_id_3', 10)->nullable();
            $table->string('flight_no_3', 10)->nullable();
            $table->dateTime('flight_date_3')->nullable();
            $table->dateTime('eta_date_3')->nullable();
            $table->string('to_dest_code_4', 10)->nullable();
            $table->string('by_airline_id_4', 10)->nullable();
            $table->string('flight_no_4', 10)->nullable();
            $table->dateTime('flight_date_4')->nullable();
            $table->dateTime('eta_date_4')->nullable();
            $table->string('air_dest_code', 50)->nullable();
            $table->string('air_dest_name', 100)->nullable();
            $table->dateTime('arrival_date_time')->nullable();
            $table->string('curr_code', 5)->nullable();
            $table->double('curr_rate')->nullable();
            $table->string('weight_val_flag', 10)->nullable();
            $table->string('frt_bill_party', 10)->nullable();
            $table->string('other_flag', 10)->nullable();
            $table->string('other_bill_party', 10)->nullable();
            $table->string('collect_curr_code', 5)->nullable();
            $table->double('collect_curr_rate')->nullable();
            $table->string('declare_val_carriage', 20)->nullable();
            $table->string('custom_curr_code', 5)->nullable();
            $table->string('custom_declare_val', 20)->nullable();
            $table->double('custom_local_amt')->nullable();
            $table->string('shipmode', 20)->nullable();
            $table->string('insure_curr_code', 5)->nullable();
            $table->double('insure_amt')->nullable();
            $table->double('insure_local_amt')->nullable();
            $table->boolean('dg_cargo')->nullable();
            $table->string('handling_info_1', 80)->nullable();
            $table->string('handling_info_2', 80)->nullable();
            $table->string('handling_info_3', 80)->nullable();
            $table->string('account_info_1', 50)->nullable();
            $table->string('account_info_2', 50)->nullable();
            $table->string('account_info_3', 50)->nullable();
            $table->string('account_info_4', 50)->nullable();
            $table->string('account_info_5', 50)->nullable();
            $table->string('account_info_6', 50)->nullable();
            $table->string('account_info_7', 50)->nullable();
            $table->string('coloader_code', 10)->nullable();
            $table->text('permit_no')->nullable();
            $table->boolean('print_dimension')->nullable();
            $table->string('delivery_type_code', 50)->nullable();
            $table->string('delivery_type', 100)->nullable();
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
        Schema::dropIfExists('air_ex_job_d1');
    }
};
