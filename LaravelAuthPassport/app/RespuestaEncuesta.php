<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaEncuesta extends Model
{
    protected $table = "respuestasencuestas";
    
    protected $fillable = ['respuesta'];
    
    public function respuestaencuestas(){
        
        return $this->belongsTo('App\RespuestaEncuesta');
        
    }
}
