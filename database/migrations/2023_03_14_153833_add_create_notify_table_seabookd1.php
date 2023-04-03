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
        Schema::table('sea_booking_d1', function (Blueprint $table) {
            $table->string('notify_code', 20)->nullable();
            $table->string('notify_name', 100)->nullable();
            $table->string('notify_address_1', 50)->nullable();
            $table->string('notify_address_2', 50)->nullable();
            $table->string('notify_address_3', 50)->nullable();
            $table->string('notify_address_4', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sea_booking_d1', function (Blueprint $table) {
            $table->dropColumn('notify_code');
            $table->dropColumn('notify_name');
            $table->dropColumn('notify_address_1');
            $table->dropColumn('notify_address_2');
            $table->dropColumn('notify_address_3');
            $table->dropColumn('notify_address_4');
        });
    }
};
