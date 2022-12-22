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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('name', 100)->nullable();
            $table->foreignId('customer_type_id')->nullable();
            $table->string('acc_code', 50)->nullable();
            $table->text('acc_desc')->nullable();
            $table->foreignId('vendor_id')->nullable();
            $table->foreignId('currency_id')->nullable();
            $table->foreignId('payment_term_id')->nullable();
            $table->string('local_name')->nullable();
            $table->string('address_1', 50)->nullable();
            $table->string('address_2', 50)->nullable();
            $table->string('address_3', 50)->nullable();
            $table->string('address_4', 50)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->string('province', 50)->nullable();
            $table->string('place', 50)->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('telex', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('web_site', 50)->nullable();
            $table->foreignId('salesman_id')->nullable();
            $table->double('credit_limit')->nullable();
            $table->string('s_contact_name', 50)->nullable();
            $table->string('s_email', 100)->nullable();
            $table->string('s_cc_email', 100)->nullable();
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
        Schema::dropIfExists('customers');
    }
};
