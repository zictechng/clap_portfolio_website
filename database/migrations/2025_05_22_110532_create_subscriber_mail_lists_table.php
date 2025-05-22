<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriberMailListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber_mail_lists', function (Blueprint $table) {
            $table->id();
            $table->string('user_phone')->nullable();
            $table->string('user_email')->nullable();
            $table->string('status')->default('active'); // active, inactive, unsubscribed
            $table->string('ip_address')->nullable(); // Optional IP tracking
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
        Schema::dropIfExists('subscriber_mail_lists');
    }
}
