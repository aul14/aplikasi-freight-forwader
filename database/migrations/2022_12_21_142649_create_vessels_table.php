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
        Schema::create('vessels', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15);
            $table->string('name', 50)->nullable();
            $table->string('short_name', 20)->nullable();
            $table->string('type', 2)->nullable();
            $table->string('classification', 10)->nullable();
            $table->string('imo', 10)->nullable();
            $table->foreignId('shipping_line_id')->nullable();
            $table->foreignId('bisnis_party_id')->nullable();
            $table->double('nrt')->nullable();
            $table->double('grt')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->double('year_build')->nullable();
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
        Schema::dropIfExists('vessels');
    }
};
