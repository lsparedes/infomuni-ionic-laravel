<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
    'nombre', 'direccion', 'contacto', 'horario_apertura', 'horario_cierre', 'descripcion_servicio', 'imagen','id_usuario'
  ];
}
