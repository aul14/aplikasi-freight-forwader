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
        Schema::create('sea_im_job_d4', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_im_job_id')->references('id')->on('sea_im_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('container_no', 15)->nullable();
            $table->double('pcs')->nullable();
            $table->double('gross_weight')->nullable();
            $table->string('cargo_commodity_code', 10)->nullable();
            $table->string('cargo_commodity', 100)->nullable();
            $table->string('seal_no', 30)->nullable();
            $table->string('cargo_container_code', 10)->nullable();
            $table->string('cargo_container', 100)->nullable();
            $table->string('cargo_uom_code', 10)->nullable();
            $table->string('cargo_uom', 100)->nullable();
            $table->double('cargo_volume')->nullable();
            $table->string('marks_1', 25)->nullable();
            $table->string('marks_2', 25)->nullable();
            $table->string('marks_3', 25)->nullable();
            $table->string('marks_4', 25)->nullable();
            $table->string('marks_5', 25)->nullable();
            $table->string('marks_6', 25)->nullable();
            $table->string('marks_7', 25)->nullable();
            $table->string('marks_8', 25)->nullable();
            $table->string('marks_9', 25)->nullable();
            $table->string('marks_10', 25)->nullable();
            $table->string('good_desc_1', 50)->nullable();
            $table->string('good_desc_2', 50)->nullable();
            $table->string('good_desc_3', 50)->nullable();
            $table->string('good_desc_4', 50)->nullable();
            $table->string('good_desc_5', 50)->nullable();
            $table->string('good_desc_6', 50)->nullable();
            $table->string('good_desc_7', 50)->nullable();
            $table->string('good_desc_8', 50)->nullable();
            $table->string('good_desc_9', 50)->nullable();
            $table->string('good_desc_10', 50)->nullable();
            $table->string('create_by', 100)->nullable();
            $table->string('update_by', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sea_im_job_d4');
    }
};
