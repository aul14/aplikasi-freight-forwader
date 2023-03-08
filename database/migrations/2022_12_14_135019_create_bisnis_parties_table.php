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
        Schema::create('bisnis_party', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10);
            $table->string('name', 100);
            $table->boolean('is_customer')->nullable();
            $table->string('customer_code', 50)->nullable();
            $table->foreignId('customer_type_id')->nullable();
            $table->string('customer_acc_code', 50)->nullable();
            $table->double('credit_limit')->nullable();
            $table->boolean('is_vendor')->nullable();
            $table->string('vendor_code', 50)->nullable();
            $table->foreignId('vendor_type_id')->nullable();
            $table->string('vendor_acc_code', 50)->nullable();
            $table->foreignId('vat_code_id')->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->date('exp_date')->nullable();
            $table->foreignId('payment_term_id')->nullable();
            $table->string('local_name')->nullable();
            $table->string('address_1', 50)->nullable();
            $table->string('address_2', 50)->nullable();
            $table->string('address_3', 50)->nullable();
            $table->string('address_4', 50)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('port_id')->nullable();
            $table->string('awb_prefix', 10)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('place', 50)->nullable();
            $table->string('marking', 20)->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('web_site', 50)->nullable();
            $table->string('telex', 30)->nullable();
            $table->string('note')->nullable();
            $table->foreignId('salesman_id')->nullable();
            $table->string('salesman_code', 100)->nullable();
            $table->string('cr_roc_rob', 30)->nullable();
            $table->string('tax_id', 30)->nullable();
            $table->boolean('nomination')->nullable();
            $table->boolean('sales_lead')->nullable();
            $table->boolean('cold_call')->nullable();
            $table->string('notify_contact_name')->nullable();
            $table->string('notify_email')->nullable();
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
        Schema::dropIfExists('bisnis_party');
    }
};
