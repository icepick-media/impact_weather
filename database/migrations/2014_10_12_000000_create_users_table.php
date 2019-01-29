<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('contact', 50)->nullable();
            $table->string('password',60)->nullable();
            $table->string('type', 50)->default('user');

            $table->string('gender', 10)->nullable();
            $table->date('birthdate')->nullable();
            $table->text('description')->nullable();

            $table->text('path')->nullable();
            $table->text('directory')->nullable();
            $table->string('filename', 100)->nullable();

            $table->dateTime('last_activity')->nullable();
            $table->dateTime('last_login')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
