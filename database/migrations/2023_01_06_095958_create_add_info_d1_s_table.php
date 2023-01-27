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
        Schema::create('add_info_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('add_info_id');
            $table->string('trx_type', 30)->nullable();
            $table->string('trx_id', 50)->nullable();
            $table->string('trx_code', 50)->nullable();
            $table->string('vs1')->nullable();
            $table->string('vs2')->nullable();
            $table->string('vs3')->nullable();
            $table->string('vs4')->nullable();
            $table->double('vn1')->nullable();
            $table->double('vn2')->nullable();
            $table->text('vt1')->nullable();
            $table->text('vt2')->nullable();
            $table->boolean('vb1')->nullable();
            $table->boolean('vb2')->nullable();
            $table->date('vd1')->nullable();
            $table->date('vd2')->nullable();
            $table->dateTime('vdt1')->nullable();
            $table->dateTime('vdt2')->nullable();
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
        Schema::dropIfExists('add_info_d1');
    }
};
