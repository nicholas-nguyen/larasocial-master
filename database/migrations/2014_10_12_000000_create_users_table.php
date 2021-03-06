<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday');
            $table->string('gender', 4);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('avatar_url');
            $table->string('hometown');
            $table->string('currentcity');
            $table->string('school');
            $table->string('skills');
            $table->string('hobby');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
