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
        Schema::create('bisnis_party_d1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bisnis_party_id')->nullable();
            $table->string('title', 20)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('telp', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('handphone', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->date('birthday')->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('twiter', 50)->nullable();
            $table->string('like', 50)->nullable();
            $table->string('dislike', 50)->nullable();
            $table->string('msn', 50)->nullable();
            $table->string('qq', 50)->nullable();
            $table->string('skype', 50)->nullable();
            $table->string('other', 50)->nullable();
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
        Schema::dropIfExists('bisnis_party_d1');
    }
};
