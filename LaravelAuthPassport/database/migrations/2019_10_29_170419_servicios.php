<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('servicios', function (Blueprint $table) {
            $table->Increments('id');
            //$table->string('nombre_emprendedor', 70);
            $table->string('nombre', 70);
            $table->string('direccion', 70);
            $table->string('contacto', 15);
            $table->string('horario_apertura', 10);
            $table->string('horario_cierre', 10);
            $table->longText('descripcion_servicio');
            $table->string('imagen', 70)->nullable();
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
        Schema::dropIfExists('servicios');
    }
}
