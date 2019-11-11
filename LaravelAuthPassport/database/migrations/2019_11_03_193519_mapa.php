<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('mapa', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('titulo',70);
            $table->string('dia_inicio', 20);
            $table->string('dia_termino', 20);
            $table->string('horario_apertura', 10);
            $table->string('horario_cierre', 10);
            $table->integer('contacto', 10);
            $table->string('paginaweb', 70);
            $table->enum('tipo', ['municipales', 'emergencias', 'turisticos']);
            $table->string('lat');
            $table->string('lng');
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
        Schema::dropIfExists('mapa');
    }
}
