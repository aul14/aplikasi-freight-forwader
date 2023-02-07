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
        Schema::table('air_quotation_d2', function (Blueprint $table) {
            $table->double('unit_rate_d2')->nullable();
            $table->double('idr_amt_d2')->nullable();
            $table->double('curr_rate_d2')->nullable();
        });
        Schema::table('sea_quotation_d2', function (Blueprint $table) {
            $table->double('unit_rate_d2')->nullable();
            $table->double('idr_amt_d2')->nullable();
            $table->double('curr_rate_d2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('air_quotation_d2', function (Blueprint $table) {
            $table->dropColumn('unit_rate_d2');
            $table->dropColumn('idr_amt_d2');
            $table->dropColumn('curr_rate_d2');
        });
        Schema::table('sea_quotation_d2', function (Blueprint $table) {
            $table->dropColumn('unit_rate_d2');
            $table->dropColumn('idr_amt_d2');
            $table->dropColumn('curr_rate_d2');
        });
    }
};
