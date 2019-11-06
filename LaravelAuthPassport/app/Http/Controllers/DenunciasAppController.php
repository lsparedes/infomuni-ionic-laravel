<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tipo;
use App\Denuncia;
use Image;

class DenunciasAppController extends Controller
{
  public function index(){
    $denuncias=DB::table('denuncias')->select('denuncias.imagen','denuncias.descripcion','denuncias.created_at','tipo.nombre')
    ->join('tipo','denuncias.tipo_id','=','tipo.id')
    ->get();
    return response()->json($denuncias);

  }

  public function tipo(){
    $tipo=DB::table('tipo')->get();
    return response()->json($tipo);
  }

  public function store(Request $request)
  {

      $tipo_denuncia = DB::table('tipo')->where('nombre',$request->tipo)->first();
      $denuncia = new Denuncia;

      //$ruta = 'equilibratechile.com/infomuni/img/';
      $ruta = public_path().'/img/denuncias/';
      $imagenOriginal = $request->file('file');
      $imagen = Image::make($imagenOriginal);
      $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
      //$imagen->resize(300,300);
      $imagen->save($ruta . $temp_name, 100);


      //$servicio->nombre_emprendedor = $request->nombre_emprendedor;
      $denuncia->descripcion = $request->comentario;
      $denuncia->imagen = $temp_name;
      $denuncia->users_id = $request->username;
      $denuncia->tipo_id = $tipo_denuncia->id;

      //$servicio->imagen = $request->file('image')->store('servicios');

      $denuncia->save();



  }

  protected function random_string()
    {
    $key = '';
    $keys = array_merge( range('a','z'), range(0,9) );

    for($i=0; $i<10; $i++)
    {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
    }

}
