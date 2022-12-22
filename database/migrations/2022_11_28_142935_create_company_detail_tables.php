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
        Schema::create('company_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable();
            $table->string('type', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('postal_code', 50)->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('email', 50)->nullable();
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
        Schema::dropIfExists('company_d1');
    }
};
