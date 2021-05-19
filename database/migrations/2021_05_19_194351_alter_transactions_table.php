<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->String('name');
            $table->String('email');
            $table->String('phone_number');
            $table->dropColumn('buyer_id');
            $table->dropColumn('payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('name');
        $table->dropColumn('email');
        $table->dropColumn('phone_number');
        $table->integer('buyer_id');
        $table->String('payment');
        
    }
}
