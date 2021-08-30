<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('userName');
            $table->string('userId');
            $table->string('userEmail');
            $table->string('userPhone');
            $table->timestamp('birthday');
            $table->string('gender');
            $table->string('city');
            $table->string('country');
            $table->text('textAbout');
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
        Schema::dropIfExists('user_basic_infos');
    }
}
