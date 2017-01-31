<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UseData extends Migration
{
    public function up()
    {
        Schema::create('user_datas', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->increments('id');
            $table->char('document_type', 1);
            $table->string('id_number', 8)->unique();
            $table->string('name');
            $table->date('birthdate');
            $table->string('phone_number', 20);
            $table->text('direction');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_datas');
    }
}
