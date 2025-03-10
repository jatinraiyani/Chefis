<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chef_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('chef_id')->unsigned();
            $table->foreign('chef_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('year_of_experience')->nullable();
            $table->string('resturant_name')->nullable();
            $table->string('specialities')->nullable();
            $table->text('about_chef')->nullable();
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
        Schema::dropIfExists('chef_details');
    }
}
