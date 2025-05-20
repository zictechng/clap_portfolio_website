<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_uid');
            $table->string('user_email')->nullable();
            $table->string('like_notify')->nullable()->default(false);
            $table->string('comment_notify')->nullable()->default(false);
            $table->string('share_notify')->nullable()->default(false);
            $table->string('show_social_link')->nullable()->default(false);
            $table->string('show_education')->nullable()->default(false);
            $table->string('show_work_experience')->nullable()->default(false);
            $table->string('show_other_link')->nullable()->default(false);
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
        Schema::dropIfExists('system_preferences');
    }
}
