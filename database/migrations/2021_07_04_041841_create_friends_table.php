<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_Id')->unsigned()->nullable();
            $table->foreign('user_Id')->references('id')->on('users')->onDelete('cascade'); 
            $table->bigInteger('friend_id')->unsigned()->nullable(); 
            $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->integer('approved')->default('0');
            $table->integer('blocked')->default('0');
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
        Schema::dropIfExists('friends');
    }
}
