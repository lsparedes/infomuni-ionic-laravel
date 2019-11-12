<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Encuesta;

use App\Pregunta;

use App\RespuestaEncuesta;

use App\Responde;

use DataTables;

use DB;

class ParticipacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encuestas = Encuesta::all();
        return view('participacion.index', compact('encuestas'));
    }
    
      public function estado($id)
    {
        $encuestas = Encuesta::find($id);
        if($encuestas->estado=='activada'){
        DB::table('encuestas')
                ->where('id', $id)
                ->update(['estado' => 'desactivada']);
        }else{
          DB::table('encuestas')
                ->where('id', $id)
                ->update(['estado' => 'activada']);  
        }
          
        return redirect()->route('participacion.index')
                        ->with('info', 'La '.$encuestas->nombre.' fue desactivada exitosamente!');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participacion.create');
    }
    
    public function reportes(){
        return view('participacion.reportes');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consulta = Encuesta::select('nombre')->where('nombre', $request->encuesta)->get();
        $hola=$request->otra;
        
        if($hola=="Finalizar encuesta"){
                 if (count($consulta) == 0) {
                
                $encuestas         = new Encuesta;
                $encuestas->nombre = $request->encuesta;
                //$encuestas->tipo   = $request->cantidad_respuestas;
                $encuestas->users_id = auth()->id();
                $encuestas->save();
            
                
                $idmax                   = Encuesta::max('id');     
                $preguntas               = new Pregunta;
                $preguntas->pregunta     = $request->preguntas;
                $preguntas->tipo = $request->cantidad_respuestas;
                $preguntas->encuestas_id = $idmax;
                $preguntas->save();
                $idmaxp = Pregunta::max('id');
                
                for ($i = 0; $i < count((array) $request->valorr); $i++) {
                    
                    //dd(count((array)$request->valorr));
                    
                    $respuestas               = new RespuestaEncuesta;
                    $respuestas->respuesta   = $request->respuestas[$i];
                    $respuestas->preguntas_id = $idmaxp;
                    $respuestas->save();
                    
                    
                }
                
                return redirect()->route('participacion.create')->with('info', 'La encuesta ' . $request->encuesta . ' fue creada exitosamente.');
                
            }
             else {
                $idmax                   = Encuesta::max('id');
                $preguntas               = new Pregunta;
                $preguntas->pregunta     = $request->preguntas;
                $preguntas->tipo = $request->cantidad_respuestas;
                $preguntas->encuestas_id = $idmax;
                $preguntas->save();
                $idmaxp = Pregunta::max('id');
                
                for ($j = 0; $j < count((array) $request->valorr); $j++) {
                    
                    $respuestas               = new RespuestaEncuesta;
                    $respuestas->respuesta   = $request->respuestas[$j];
                    $respuestas->preguntas_id = $idmaxp;
                    $respuestas->save();
                    
                    
                }
                return redirect()->route('participacion.create')->with('info', 'La encuesta ' . $request->encuesta . ' fue creada exitosamente.');
            }
        }
        if($hola=="Agregar otra pregunta"){
              if (count($consulta) == 0) {
                
                $encuestas         = new Encuesta;
                $encuestas->nombre = $request->encuesta;
                //$encuestas->tipo   = $request->cantidad_respuestas;
                $encuestas->users_id = auth()->id();
                $encuestas->save();
                
                $idmax                   = Encuesta::max('id');
                $preguntas               = new Pregunta;
                $preguntas->pregunta     = $request->preguntas;
                $preguntas->tipo = $request->cantidad_respuestas;
                $preguntas->encuestas_id = $idmax;
                $preguntas->save();
                $idmaxp = Pregunta::max('id');
                
                for ($i = 0; $i < count((array) $request->valorr); $i++) {
                    
                    //dd(count((array)$request->valorr));
                    
                    $respuestas               = new RespuestaEncuesta;
                    $respuestas->respuesta   = $request->respuestas[$i];
                    $respuestas->preguntas_id = $idmaxp;
                    $respuestas->save();
                    
                    
                }
                
                return redirect()->route('participacion.create')->withInput();
            }
             else {
                $idmax                   = Encuesta::max('id');
                $preguntas               = new Pregunta;
                $preguntas->pregunta     = $request->preguntas;
                $preguntas->tipo = $request->cantidad_respuestas;
                $preguntas->encuestas_id = $idmax;
                $preguntas->save();
                $idmaxp = Pregunta::max('id');
                
                for ($j = 0; $j < count((array) $request->valorr); $j++) {
                    
                    $respuestas               = new RespuestaEncuesta;
                    $respuestas->respuesta   = $request->respuestas[$j];
                    $respuestas->preguntas_id = $idmaxp;
                    $respuestas->save();
                    
                    
                }
                return redirect()->route('participacion.create')->withInput();
            }
        }
        

        
    }
    
       function getdata()
    {
        $encuestas = Encuesta::all();
        return DataTables::of($encuestas)->make(true);

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuestas = Encuesta::find($id);
        $pregs = Pregunta::where('encuestas_id', $id)->get();
        $resps = RespuestaEncuesta::select('respuestasencuestas.respuesta','respuestasencuestas.preguntas_id')
                ->leftJoin('preguntas', 'respuestasencuestas.preguntas_id','=','preguntas.id')
                ->leftJoin('encuestas', 'preguntas.encuestas_id','=','encuestas.id')
                ->where('encuestas.id','=',$id)
                ->get();
        
        return view('participacion.show', compact('encuestas', 'pregs','resps'));
    }
    
    /**i
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*    public function edit($id)
    {
        $encuestas = Encuesta::find($id);
        $preguntas = Pregunta::where('id_encuestas', $id)->get();
        $respuestas = Respuesta::select('respuestas_encuestas.respuesta','respuestas_encuestas.id_preguntas')
                ->leftJoin('preguntas', 'respuestas_encuestas.id_preguntas','=','preguntas.id')
                ->leftJoin('encuestas', 'preguntas.id_encuestas','=','encuestas.id')
                ->where('encuestas.id','=',$id)
                ->get();
        
        return view('participacion.edit', compact('encuestas','preguntas','respuestas'));
    }
    */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encuestas = Encuesta::find($id);
        $encuestas->delete();
        
        return redirect()->route('participacion.index')
                        ->with('info', 'La encuesta '.$encuestas->nombre.' fue eliminada correctamente');
    }
}

