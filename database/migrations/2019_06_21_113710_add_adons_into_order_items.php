<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdonsIntoOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('order_items', function (Blueprint $table) {
          $table->string('adons');
          $table->string('adons_price');
          $table->string('adons_name')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('order_items', function (Blueprint $table) {
          $table->string('adons');
          $table->string('adons_price');
          $table->string('adons_name');
      });
    }
}
