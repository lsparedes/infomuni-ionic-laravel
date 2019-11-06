<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Encuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombre', 70);
            $table->enum('estado', ['activada', 'desactivada'])->default('activada');;
            $table->integer('users_id')->unsigned();
            $table->timestamps();
                
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
        Schema::dropIfExists('encuestas');
    }
}
