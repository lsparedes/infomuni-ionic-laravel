<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Responde extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('responde', function (Blueprint $table) {
       $table->Increments('id');
       $table->integer('encuestas_id')->unsigned();
       $table->integer('users_id')->unsigned();
       $table->enum('estado', ['respondida', 'no_respondida'])->default('no_respondida');
       $table->timestamps();

       $table->foreign('encuestas_id')->references('id')->on('encuestas')
                   ->onDelete('cascade')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
           
       $table->foreign('users_id')->references('id')->on('users')
             ->onDelete('cascade')
             ->onDelete('cascade')
             ->onUpdate('cascade');

        

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('responde');
    }
}
