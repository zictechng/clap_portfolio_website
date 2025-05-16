<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbedMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embed_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_uid');
            $table->unsignedBigInteger('project_id');
            $table->string('user_email')->nullable();
            $table->string('embed_media_name')->nullable();
            $table->string('embed_media_type')->nullable();
            $table->string('embed_media_ratio')->nullable();
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
        Schema::dropIfExists('embed_media');
    }
}
