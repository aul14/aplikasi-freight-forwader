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
        Schema::create('airlines', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5);
            $table->string('airline_id', 5);
            $table->string('name', 50)->nullable();
            $table->string('image_airline')->nullable();
            $table->foreignId('bisnis_party_id')->nullable();
            $table->boolean('is_vendor')->nullable();
            $table->string('vendor_code', 50)->nullable();
            $table->string('vendor_acc_code', 50)->nullable();
            $table->string('address_1', 50)->nullable();
            $table->string('address_2', 50)->nullable();
            $table->string('address_3', 50)->nullable();
            $table->string('address_4', 50)->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('web_site')->nullable();
            $table->string('contact', 50)->nullable();
            $table->double('comission')->nullable();
            $table->boolean('neutral')->nullable();
            $table->boolean('ccn')->nullable();
            $table->string('analysis_code', 30)->nullable();
            $table->string('terminal', 30)->nullable();
            $table->double('no_column')->nullable();
            $table->double('no_row')->nullable();
            $table->double('left_margin')->nullable();
            $table->double('top_margin')->nullable();
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
        Schema::dropIfExists('airlines');
    }
};
