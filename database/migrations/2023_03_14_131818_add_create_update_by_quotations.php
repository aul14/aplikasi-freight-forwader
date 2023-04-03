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
        Schema::table('quotations', function (Blueprint $table) {
            $table->string('create_by', 100)->nullable();
            $table->string('update_by', 100)->nullable();
        });
        Schema::table('air_bookings', function (Blueprint $table) {
            $table->string('create_by', 100)->nullable();
            $table->string('update_by', 100)->nullable();
        });
        Schema::table('sea_bookings', function (Blueprint $table) {
            $table->string('create_by', 100)->nullable();
            $table->string('update_by', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropColumn('create_by');
            $table->dropColumn('update_by');
        });
        Schema::table('air_bookings', function (Blueprint $table) {
            $table->dropColumn('create_by');
            $table->dropColumn('update_by');
        });
        Schema::table('sea_bookings', function (Blueprint $table) {
            $table->dropColumn('create_by');
            $table->dropColumn('update_by');
        });
    }
};
