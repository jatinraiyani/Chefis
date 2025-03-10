<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('chef_id');
            $table->string('order_number');
            $table->string('total_qty');
            $table->string('order_subtotal')->nullable();
            $table->string('order_total')->nullable();
            $table->string('order_discount')->nullable();
            $table->string('order_final_total')->nullable();
            $table->string('tax')->nullable();
            $table->text('order_address')->nullable();
            $table->string('order_lat')->nullable();
            $table->string('order_lang')->nullable();
            $table->string('order_zipcode')->nullable();
            $table->enum('order_status',['pending','confirm','driver_accept','driver_pickup','pack','delivered','canceled_by_user','canceled_by_chef','canceled_by_admin'])->default('pending');
            $table->string('order_cancel_reason')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('payment_status',['pending','success','failed'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
