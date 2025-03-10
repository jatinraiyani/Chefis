<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColoumnItemTimings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_timing', function (Blueprint $table) {
            $table->string('qty')->nullable();
            $table->string('delivered_day')->nullable();
            $table->string('delivered_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_timing', function (Blueprint $table) {
            //
        });
    }
}
