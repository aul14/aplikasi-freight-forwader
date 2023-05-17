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
            $table->double('unit_rate')->nullable();
            $table->double('idr_amt')->nullable();
            $table->double('curr_rate')->nullable();
        });
        Schema::table('sea_quotation_d2', function (Blueprint $table) {
            $table->double('unit_rate')->nullable();
            $table->double('idr_amt')->nullable();
            $table->double('curr_rate')->nullable();
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
            $table->dropColumn('unit_rate');
            $table->dropColumn('idr_amt');
            $table->dropColumn('curr_rate');
        });
        Schema::table('sea_quotation_d2', function (Blueprint $table) {
            $table->dropColumn('unit_rate');
            $table->dropColumn('idr_amt');
            $table->dropColumn('curr_rate');
        });
    }
};
