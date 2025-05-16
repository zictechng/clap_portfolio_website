<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_projects', function (Blueprint $table) {
            $table->id();
            $table->string('user_uid');
            $table->string('user_email')->nullable();
            $table->string('project_title')->nullable();
            $table->string('project_concept')->nullable();
            $table->longText('project_description')->nullable();
            $table->string('project_status')->default('active');
            $table->boolean('project_feature')->default(false);
            $table->string('project_image')->nullable();
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
        Schema::dropIfExists('new_projects');
    }
}
