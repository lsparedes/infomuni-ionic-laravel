<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Preguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('preguntas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('pregunta', 70);
            $table->enum('tipo', ['una_respuestas', 'mas_respuestas']);
            $table->integer('encuestas_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('encuestas_id')->references('id')->on('encuestas')
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
        Schema::dropIfExists('preguntas');
    }
}
