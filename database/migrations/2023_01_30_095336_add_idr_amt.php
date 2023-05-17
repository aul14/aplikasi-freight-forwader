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
        Schema::table('sea_quotation_s_d1', function (Blueprint $table) {
            $table->double('unit_rate')->nullable();
            $table->double('idr_amt')->nullable();
        });

        Schema::table('air_quotation_s_d2', function (Blueprint $table) {
            $table->double('unit_rate')->nullable();
            $table->double('idr_amt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sea_quotation_s_d1', function (Blueprint $table) {
            $table->dropColumn('unit_rate');
            $table->dropColumn('idr_amt');
        });

        Schema::table('air_quotation_s_d2', function (Blueprint $table) {
            $table->dropColumn('unit_rate');
            $table->dropColumn('idr_amt');
        });
    }
};
