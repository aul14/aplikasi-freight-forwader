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
            $table->string('salesman', 150)->nullable();
            $table->string('customer_code', 50)->nullable()->references('code')->on('bisnis_party')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('customer', 100)->nullable();
            $table->string('term_code', 50)->nullable()->references('code')->on('payment_term')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('term', 150)->nullable();
            $table->string('commodity_code', 50)->nullable()->references('code')->on('commodity')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('commodity', 150)->nullable();
            $table->string('delivery_type_code', 50)->nullable()->references('type')->on('delivery_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('delivery_type', 150)->nullable();
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
            $table->dropColumn('salesman');
            $table->dropColumn('customer_code');
            $table->dropColumn('customer');
            $table->dropColumn('term_code');
            $table->dropColumn('term');
            $table->dropColumn('commodity_code');
            $table->dropColumn('commodity');
            $table->dropColumn('delivery_type_code');
            $table->dropColumn('delivery_type');
        });
    }
};
