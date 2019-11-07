<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mapa;

class MapaAppController extends Controller
{
    public function index(){
        
        $mapa = Mapa::all();
        return response()->json($mapa);
    }
}
