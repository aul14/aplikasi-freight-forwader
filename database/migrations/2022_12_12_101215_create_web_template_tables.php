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
        Schema::create('web_template', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('sidebar_color', 50)->nullable();
            $table->string('sidebar_type', 50)->nullable();
            $table->string('mode', 50)->nullable();
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
        Schema::dropIfExists('web_template');
    }
};
