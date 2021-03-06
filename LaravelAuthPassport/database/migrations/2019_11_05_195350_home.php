<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Home extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW home AS SELECT eventos.id as id, eventos.nombre as nombre, eventos.lugar as donde, eventos.fecha as info, eventos.imagen as imagen, 'eventos' as tipo FROM eventos UNION SELECT servicios.id as id, servicios.nombre as nombre, servicios.direccion as donde, servicios.contacto as info, servicios.imagen as imagen, 'servicios' as tipo FROM servicios UNION SELECT denuncias.id as id, denuncias.descripcion as nombre, 'no aplica' as donde, denuncias.created_at as info, denuncias.imagen as imagen, 'denuncias' as tipo from denuncias");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::statement("DROP VIEW home");
    }
}
