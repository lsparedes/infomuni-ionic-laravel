<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Respuestasencuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
        Schema::create('respuestasencuestas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('respuesta', 70);
            $table->integer('preguntas_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('preguntas_id')->references('id')->on('preguntas')
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
        Schema::dropIfExists('respuestasencuestas');
    }
}
