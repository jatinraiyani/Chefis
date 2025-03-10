<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProducttypeIntoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('orders', function (Blueprint $table) {
          $table->enum('prodtype',['1','2']);
          $table->string('schedule_date')->nullable();
          $table->string('schedule_time')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('orders', function (Blueprint $table) {
          $table->enum('prodtype',['1','2']);
          $table->string('schedule_date');
          $table->string('schedule_time');
      });
    }
}
