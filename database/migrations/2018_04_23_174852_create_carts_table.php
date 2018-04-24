<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         *
         * 'music_id',
        'author_id',
        'amount',
        'total'
        'commande_id'
         */
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->integer('music_id');
            $table->integer('author_id');
            $table->string('amount');
            $table->decimal('total',10,2);
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
        Schema::table('carts', function (Blueprint $table) {
            //
        });
    }
}
