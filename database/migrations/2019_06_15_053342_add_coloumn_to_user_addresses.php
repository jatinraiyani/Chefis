<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnToUserAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            $table->longText('address2')->nullable()->after('address');
            $table->string('contact_no')->nullable()->after('address');
            $table->string('zipcode')->nullable()->after('address');
            $table->string('city')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            $table->dropColumn('address2');
            $table->dropColumn('contact_no');
            $table->dropColumn('zipcode');
            $table->dropColumn('city');
        });
    }
}
