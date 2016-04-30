<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_user', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # `comic_id` and `user_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `comic_id` will reference the `comics table` and `user_id` will reference the `users` table.
            $table->integer('user_id')->unsigned();
            $table->integer('comic_id')->unsigned();

            # Make foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('comic_id')->references('id')->on('comics');

            $table->integer('collection');
            $table->integer('wishlist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comic_user');
    }
}
