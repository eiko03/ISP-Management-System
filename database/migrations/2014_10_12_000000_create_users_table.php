<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status');
            $table->string('password');
            $table->dateTime('activated_at')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('package')->nullable();
            $table->string('phone')->nullable();
            $table->string('type')->nullable();
            $table->string('package_id')->nullable();
            $table->string('package_pass')->nullable();
            $table->integer('package_speed')->nullable();
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
        Schema::dropIfExists('users');
    }
}
