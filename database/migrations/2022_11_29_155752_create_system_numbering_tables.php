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
        Schema::create('system_numbering', function (Blueprint $table) {
            $table->id();
            $table->string('cycle', 2)->nullable();
            $table->text('description')->nullable();
            $table->string('job_type')->nullable();
            $table->double('next_number')->nullable();
            $table->double('length_number')->nullable();
            $table->text('prefix')->nullable();
            $table->foreignId('module_id')->nullable();
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
        Schema::dropIfExists('system_numbering');
    }
};
