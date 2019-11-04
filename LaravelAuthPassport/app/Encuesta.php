<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = "encuestas";

    protected $fillable = ['nombre','estado'];

    public function preguntas(){

        return $this->belongsTo('App\Pregunta');

    }

    
}
