<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
     protected $table = 'mapa';
    
     protected $fillable = [
    'titulo', 'lat', 'lng'
  ];
}
