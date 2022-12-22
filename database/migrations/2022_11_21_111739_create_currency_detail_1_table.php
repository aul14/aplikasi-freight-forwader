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
        Schema::create('currency_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_id');
            $table->date('date')->nullable();
            $table->double('curr_rate')->nullable();
            $table->string('remark', 50)->nullable();
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
        Schema::dropIfExists('currency_d1');
    }
};
