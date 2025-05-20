<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_url')->nullable();
            $table->string('user_occupation')->nullable();
            $table->string('user_company')->nullable();
            $table->text('user_biography')->nullable();
            $table->string('user_profile_banner')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profile_url',
                'user_occupation',
                'user_company',
                'user_biography',
                'user_profile_banner'
            ]);
        });
    }
}
