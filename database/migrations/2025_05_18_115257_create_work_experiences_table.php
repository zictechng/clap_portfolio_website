<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_uid');
            $table->string('user_email')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_organization')->nullable();
            $table->string('job_start_date')->nullable();
            $table->string('job_end_date')->nullable();
            $table->boolean('job_active')->nullable()->default(false);
            $table->foreign('user_uid')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('work_experiences');
    }
}
