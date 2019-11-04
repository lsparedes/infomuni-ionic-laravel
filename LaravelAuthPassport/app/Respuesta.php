<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = "respuestas";
    
    protected $fillable = ['respuesta'];
    
    public function respuestas(){
        
        return $this->belongsTo('App\Respuesta');
        
    }
    
      public function users(){
        
        return $this->belongsTo('App\User');
        
    }
}
