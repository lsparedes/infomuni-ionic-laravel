<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\Pregunta;
use App\Respuesta;
use DB;

class ParticipacionAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function encuestas($id)
    {
       
    
      $encuestas = DB::table('encuestas')
                   ->join('preguntas','encuestas.id','=','preguntas.encuestas_id')
                   ->join('respuestas','preguntas.id','=','respuestas.preguntas_id')
                   ->where('respuestas.users_id','=',$id)
                   ->where('estado','=','activada')->get();
        

      return  response()->json($encuestas);
    }
    
    public function resultados(){
        
        $existe = Encuesta::all();
        return  response()->json($existe);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $encuesta=new Respuesta;
        $encuesta->respuesta=$request->respuesta_seleccionada;
        $encuesta->preguntas_id=$request->pregunta;
        $encuesta->users_id=$request->username;

        //dd($pregunta->id);
        $encuesta->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregunta=DB::table('preguntas')->where('encuestas_id','=',$id)->get();
        return  response()->json($pregunta);

        // $pregunta=DB::table('preguntas')->select('preguntas.id','preguntas.pregunta','preguntas.tipo','respuestasencuestas.id','respuestasencuestas.respuesta')->join('respuestasencuestas','preguntas.id','=','respuestasencuestas.preguntas_id')
        // ->where('preguntas.encuestas_id','=',$id)->get();
        // return  response()->json($pregunta);
    }

    public function show2($id)
    {


        $respuesta=DB::table('respuestasencuestas')->select('respuestasencuestas.respuesta','respuestasencuestas.preguntas_id')->join('preguntas','preguntas.id','=','respuestasencuestas.preguntas_id')
        ->join('encuestas','encuestas.id','=','preguntas.encuestas_id')
        ->where('encuestas.id','=',$id)->get();
        return  response()->json(  $respuesta);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
