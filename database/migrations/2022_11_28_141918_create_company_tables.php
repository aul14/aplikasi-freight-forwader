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
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('image_company')->nullable();
            $table->string('name');
            $table->string('branch_name', 50)->nullable();
            $table->string('site')->nullable();
            $table->string('web_site', 50)->nullable();
            $table->string('regis_no', 30)->nullable();
            $table->string('vat_regis_no', 30)->nullable();
            $table->string('iata_agent_code', 30)->nullable();
            $table->foreignId('currency_id')->nullable();
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
        Schema::dropIfExists('company');
    }
};
