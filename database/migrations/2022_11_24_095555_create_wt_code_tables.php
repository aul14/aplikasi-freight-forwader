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
        Schema::create('wt_code', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->unique();
            $table->string('description', 50)->nullable();
            $table->double('tax_rate')->nullable();
            $table->foreignId('vendor_type_id')->nullable();
            $table->string('wht_c_acc_code', 50)->nullable();
            $table->string('wht_p_acc_code', 50)->nullable();
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
        Schema::dropIfExists('wt_code');
    }
};
