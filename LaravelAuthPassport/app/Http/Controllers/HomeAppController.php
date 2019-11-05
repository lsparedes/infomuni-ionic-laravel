<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = DB::table('home')->orderBy('info','desc')->get();
        return response()->json($todo);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$tipo)
    {
        $detalle = DB::table('home')->select('home.nombre','home.donde','home.info','home.imagen','home.tipo','det.descripcion','det.infoextra1','det.infoextra2','det.tipo')
        ->join('detalle_home as det' ,'det.tipo','=','home.tipo')
        ->join('detalle_home as deta','deta.id','=','home.id')
        ->where('det.id','=',$id)
        ->where('det.tipo','=',$tipo)->get();
        return response()->json($detalle);
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
