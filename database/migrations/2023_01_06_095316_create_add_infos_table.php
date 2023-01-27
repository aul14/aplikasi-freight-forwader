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
        Schema::create('add_info', function (Blueprint $table) {
            $table->id();
            $table->string('trx_type', 30)->nullable();
            $table->string('ks1')->nullable();
            $table->string('ks2')->nullable();
            $table->string('ks3')->nullable();
            $table->string('ks4')->nullable();
            $table->string('kn1')->nullable();
            $table->string('kn2')->nullable();
            $table->string('kt1')->nullable();
            $table->string('kt2')->nullable();
            $table->string('kb1')->nullable();
            $table->string('kb2')->nullable();
            $table->string('kd1')->nullable();
            $table->string('kd2')->nullable();
            $table->string('kdt1')->nullable();
            $table->string('kdt2')->nullable();
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
        Schema::dropIfExists('add_info');
    }
};
