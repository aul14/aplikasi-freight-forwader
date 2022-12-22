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
        Schema::create('container', function (Blueprint $table) {
            $table->id();
            $table->string('type', 10);
            $table->string('description', 50);
            $table->string('size', 10);
            $table->string('iso_size', 5)->nullable();
            $table->double('no_of_teu')->nullable();
            $table->double('max_cubic')->nullable();
            $table->double('max_volume')->nullable();
            $table->double('max_weight')->nullable();
            $table->boolean('temp_flag')->nullable();
            $table->boolean('temp_degree')->nullable();

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
        Schema::dropIfExists('container');
    }
};
