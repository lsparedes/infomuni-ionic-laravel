<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Eventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
            Schema::create('eventos', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombre', 70);
            $table->string('lugar', 90);
            $table->date('fecha');
            $table->longText('descripcion');
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
       Schema::dropIfExists('eventos');
    }
}
