<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatProjectToolsSourceData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_uid');
            $table->unsignedBigInteger('project_id');
            $table->string('user_email')->nullable();
            $table->string('project_tools')->nullable();
            $table->text('data_url_source')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('project_tools');
    }
}
