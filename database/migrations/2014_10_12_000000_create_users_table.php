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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('password');
            $table->enum('status',['active','inactive','block'])->default('active');
            $table->enum('is_agree',['yes','no'])->default('yes');
            $table->enum('is_notification',['true','false'])->default('true');
            $table->enum('is_password_change',['true','false'])->default('false');
            $table->string('device_id')->nullable();
            $table->longText('device_token')->nullable();
            $table->enum('device_type',['android','ios'])->nullable();
            $table->string('customer_id')->nullable();
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
