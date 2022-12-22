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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('name', 50);
            $table->double('idd')->nullable();
            $table->string('region_code', 10)->nullable();
            $table->string('zone_code', 10)->nullable();
            $table->text('handling_instructions')->nullable();
            $table->text('handling_instructions_port')->nullable();
            $table->text('handling_instructions_symbol')->nullable();
            $table->text('special_instructions')->nullable();
            $table->string('image_country')->nullable();

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
        Schema::dropIfExists('countries');
    }
};
