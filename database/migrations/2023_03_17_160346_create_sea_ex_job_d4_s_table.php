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
        Schema::create('sea_ex_job_d4', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sea_ex_job_id')->references('id')->on('sea_ex_jobs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('letter_of_credit', 50)->nullable();
            $table->boolean('obl_surrendered')->nullable();
            $table->string('obl_freight', 20)->nullable();
            $table->string('place_of_issue', 50)->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('laden_on_board')->nullable();
            $table->boolean('telex_release')->nullable();
            $table->string('issue_by', 50)->nullable();
            $table->text('said_to_contain')->nullable();
            $table->text('total_pcs_in_word')->nullable();
            $table->string('do_release_to', 80)->nullable();
            $table->date('do_release_date')->nullable();
            $table->date('cargo_collection_date')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('sea_ex_job_d4');
    }
};
