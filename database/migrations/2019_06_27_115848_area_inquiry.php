<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AreaInquiry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('area_inquiry', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('area_id')->unsigned();
          $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade')->onUpdate('cascade');
          $table->string('name');
          $table->string('email');
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
        Schema::dropIfExists('area_inquiry');
    }
}
