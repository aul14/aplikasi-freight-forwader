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
        Schema::create('salesman', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10);
            $table->string('name', 50)->nullable();
            $table->string('employee_code', 10)->nullable();
            $table->string('password', 10)->nullable();
            $table->string('area', 10)->nullable();
            $table->string('division', 10)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('telp', 50)->nullable();
            $table->string('hanphone', 50)->nullable();
            $table->date('join_date')->nullable();
            $table->date('resign_date')->nullable();
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
        Schema::dropIfExists('salesman');
    }
};
