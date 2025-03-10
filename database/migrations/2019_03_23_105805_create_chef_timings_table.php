<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chef_timings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('chef_id')->unsigned();
            $table->foreign('chef_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('day');
            $table->string('first_open')->nullable();
            $table->string('first_close')->nullable();
            $table->string('second_open')->nullable();
            $table->string('second_close')->nullable();
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
        Schema::dropIfExists('chef_timings');
    }
}
