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
            $table->softDeletes();
        });

        Schema::table('sea_quotation_d1', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('sea_quotation_d2', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('sea_quotation_s_d1', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('air_quotation_d1', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('air_quotation_d2', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('air_quotation_s_d1', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('air_quotation_s_d2', function (Blueprint $table) {
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
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('sea_quotation_d1', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('sea_quotation_d2', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('sea_quotation_s_d1', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('air_quotation_d1', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('air_quotation_d2', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('air_quotation_s_d1', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('air_quotation_s_d2', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
};
