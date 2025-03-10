<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnChefDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chef_details', function (Blueprint $table) {
            $table->enum('is_hyginic_course',['yes','no'])->default('no');
            $table->string('hyginic_course')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chef_details', function (Blueprint $table) {
            $table->dropColumn('hyginic_course','is_hyginic_course');
        });
    }
}
