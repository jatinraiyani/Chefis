<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAddressDataFromOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_address');
            $table->dropColumn('order_lat');
            $table->dropColumn('order_lang');
            $table->dropColumn('order_zipcode');
            $table->integer('address_id')->after('tax');
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
            $table->string('order_address');
            $table->string('order_lat');
            $table->string('order_lang');
            $table->string('order_zipcode');
            $table->integer('address_id');
        });
    }
}
