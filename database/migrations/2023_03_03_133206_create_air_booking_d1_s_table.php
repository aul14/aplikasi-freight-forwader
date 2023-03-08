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
        Schema::create('air_booking_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('air_booking_id')->references('id')->on('air_bookings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('s_no')->nullable();
            $table->double('loose_qty')->nullable();
            $table->double('pcs_rcp')->nullable();
            $table->string('uom_d1', 10)->nullable();
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('dimension')->nullable();
            $table->double('sum_m3')->nullable();
            $table->double('sum_volwt')->nullable();
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
        Schema::dropIfExists('air_booking_d1');
    }
};
