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
        Schema::create('air_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->dateTime('booking_date')->nullable();
            $table->string('job_no', 50)->unique()->nullable();
            $table->date('job_date')->nullable();
            $table->string('job_type', 10)->nullable();
            $table->string('quotation_no', 30)->nullable();
            $table->string('code_customer', 20)->nullable();
            $table->string('customer', 100)->nullable();
            $table->string('booking_from', 50)->nullable();
            $table->boolean('nomination_cargo')->nullable();
            $table->string('reference_no', 50)->nullable();
            $table->string('email')->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('shipmode', 20)->nullable();
            $table->string('payment_term', 10)->nullable();
            $table->string('awb_no', 20)->nullable();
            $table->string('mawb_no', 20)->nullable();
            $table->string('shipment_type', 12)->nullable();
            $table->string('shipper_code', 10)->nullable();
            $table->string('shipper_name', 100)->nullable();
            $table->string('consignee_code', 10)->nullable();
            $table->string('consignee_name', 100)->nullable();
            $table->string('coloader_code', 50)->nullable();
            $table->string('coloader_name', 100)->nullable();
            $table->string('overseas_agent_code', 20)->nullable();
            $table->string('overseas_agent_name', 100)->nullable();
            $table->string('overseas_agent_address_1', 50)->nullable();
            $table->string('overseas_agent_address_2', 50)->nullable();
            $table->string('overseas_agent_address_3', 50)->nullable();
            $table->string('overseas_agent_address_4', 50)->nullable();
            $table->string('notify_code', 20)->nullable();
            $table->string('notify_name', 100)->nullable();
            $table->string('notify_address_1', 50)->nullable();
            $table->string('notify_address_2', 50)->nullable();
            $table->string('notify_address_3', 50)->nullable();
            $table->string('notify_address_4', 50)->nullable();
            $table->string('agent_code', 50)->nullable();
            $table->string('agent_name', 100)->nullable();
            $table->string('air_dept_code', 50)->nullable();
            $table->string('air_dept_name', 100)->nullable();
            $table->string('air_dest_code', 50)->nullable();
            $table->string('air_dest_name', 100)->nullable();
            $table->string('country_origin_code', 10)->nullable();
            $table->string('delivery_type_code', 10)->nullable();
            $table->string('delivery_type_name', 100)->nullable();
            $table->string('weight_val_flag', 10)->nullable();
            $table->string('other_flag', 10)->nullable();
            $table->string('uom_code', 50)->nullable();
            $table->string('uom', 100)->nullable();
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
            $table->string('service_level', 20)->nullable();
            $table->double('pcs')->nullable();
            $table->double('gross_weight')->nullable();
            $table->double('volume_weight')->nullable();
            $table->string('commodity_code', 50)->nullable();
            $table->string('commodity', 150)->nullable();
            $table->string('footer_1', 150)->nullable();
            $table->string('footer_2', 150)->nullable();
            $table->string('footer_3', 150)->nullable();
            $table->string('footer_4', 150)->nullable();
            $table->string('footer_5', 150)->nullable();
            $table->string('footer_6', 150)->nullable();
            $table->string('footer_7', 150)->nullable();
            $table->string('footer_8', 150)->nullable();
            $table->string('footer_9', 150)->nullable();
            $table->string('footer_10', 150)->nullable();
            $table->text('footnote')->nullable();
            $table->string('satuan_dimension', 5)->nullable();
            $table->double('total_m3')->nullable();
            $table->double('total_pcs')->nullable();
            $table->double('total_dimension')->nullable();
            $table->double('total_vol_wt')->nullable();
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
        Schema::dropIfExists('air_bookings');
    }
};
