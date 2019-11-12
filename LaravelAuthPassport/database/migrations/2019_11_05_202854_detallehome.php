<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detallehome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          DB::statement("CREATE VIEW detalle_home AS SELECT servicios.id as id, servicios.descripcion_servicio as descripcion, servicios.dia_inicio as diainicio, servicios.dia_termino as diafinal, servicios.correo as correo, servicios.horario_apertura as infoextra1, servicios.horario_cierre as infoextra2,'servicios' as tipo from servicios UNION SELECT eventos.id as id, eventos.descripcion as descripcion, 'no aplica' as diainicio, 'no aplica' as diafinal, 'no aplica' as correo, 'no aplica' as infoextra1, 'no aplica' as infoextra2, 'eventos' as tipo FROM eventos");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW detalle_home");
    }
}
