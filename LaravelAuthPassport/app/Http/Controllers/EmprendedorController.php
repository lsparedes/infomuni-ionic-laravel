<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Servicio;
use App\User;
use App\Imports\ServicioImport;
use Image;

class EmprendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('emprende.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emprende.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $servicio = new Servicio;
        
        //$ruta = 'equilibratechile.com/infomuni/img/';
        //$ruta = public_path().'/img/servicios/';
        //$imagenOriginal = $request->file('image');
        //$imagen = Image::make($imagenOriginal);
        //$temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
        //$imagen->resize(300,300);
        //$imagen->save($ruta . $temp_name, 100);
        
        //$servicio->nombre_emprendedor = $request->nombre_emprendedor;
        $servicio->nombre = $request->nombre_servicio;
        $servicio->direccion = $request->direccion;
        $servicio->contacto = $request->contacto;
        $servicio->descripcion_servicio = $request->descripcion;
        $servicio->horario_apertura = $request->horarioapertura.' '.$request->tipohorario;
        $servicio->horario_cierre = $request->horariocierre.' '.$request->tipohorario2;
        $servicio->imagen = 'no existe';
        //$servicio->imagen = $request->file('image')->store('servicios');
        $servicio->users_id = auth()->id();
        $servicio->save();

        return redirect()->route('emprende.create')
                        ->with('info', 'El emprendedor '.$servicio->nombre_servicio.' fue creado exitosamente!');
                        
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
    
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ServicioImport, $file);
        return back()->with('message', 'Importanción de emprendedores completada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$servicios = Servicio::find($id);
        //dd($servicios);
        //return view('emprende.show', compact('servicios', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicios = Servicio::find($id);
        
        $horarioa = explode(' ', $servicios->horario_apertura, 2);
        $horarioa1 = $horarioa[0];
        $horarioa2 = $horarioa[1];
        
        $horarioc = explode(' ', $servicios->horario_cierre, 2);
        $horarioc1 = $horarioc[0];
        $horarioc2 = $horarioc[1];
        
        //dd($horarioa1,"/",$horarioa2);
        return view('emprende.edit', compact('servicios','horarioa1','horarioa2','horarioc1','horarioc2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->nombre = $request->nombre_servicio;
        $servicio->direccion = $request->direccion;
        $servicio->contacto = $request->contacto;
        $servicio->descripcion_servicio = $request->descripcion;
        $servicio->horario_apertura = $request->horarioapertura.' '.$request->tipohorario;
        $servicio->horario_cierre = $request->horariocierre.' '.$request->tipohorario2;
        $servicio->imagen = 'no existe';
        $servicio->users_id = auth()->id();
        $servicio->save();

        return redirect()->route('emprende.index')
                        ->with('info', 'El emprendedor '.$servicio->nombre_servicio.' fue modificado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicios = Servicio::find($id);
        $servicios->delete();
        
        $mi_imagen = public_path().'/img/servicios/'.$servicios->imagen;
           
        if (@getimagesize($mi_imagen)) {
            //echo "El archivo existe";
            unlink($mi_imagen);
        }
        
        return back()->with('info', ' El emprendedor '.$servicios->nombre.' fue eliminado correctamente!');
    }
}
