<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Denuncia;

class DenunciasController extends Controller
{
    public function index(){
        
        $denuncias=DB::table('denuncias')
            ->select('denuncias.id','users.name','denuncias.created_at', 'tipo.nombre', 'denuncias.descripcion','denuncias.estado')
            ->leftJoin('users','users.id','=','denuncias.users_id')
            ->leftJoin('tipo', 'tipo.id', '=', 'denuncias.tipo_id')
            ->get();
        
        return view('denuncias.index', compact('denuncias'));
            
    }
    
     public function show($id)
    {
        $denuncias=DB::table('denuncias')
            ->select('denuncias.id','users.name','denuncias.created_at', 'tipo.nombre', 'denuncias.descripcion','denuncias.estado')
            ->leftJoin('users','users.id','=','denuncias.users_id')
            ->leftJoin('tipo', 'tipo.id', '=', 'denuncias.tipo_id')
            ->where('denuncias.id','=',$id)
            ->first();
       
        //dd($denuncias);
        return view('denuncias.show', compact('denuncias'));
    }
    
    public function estado($id){
        
        $denuncias = Denuncia::find($id);
        if($denuncias->estado=='activada'){
        DB::table('denuncias')
                ->where('id', $id)
                ->update(['estado' => 'bloqueada']);
              
        return redirect()->route('denuncias.index')
                        ->with('info', 'La denuncia fue bloqueada exitosamente!');
        }else{
          DB::table('denuncias')
                ->where('id', $id)
                ->update(['estado' => 'activada']);  
            
          return redirect()->route('denuncias.index')
                        ->with('info', 'La denuncia fue desbloqueada exitosamente!');
        }
          
      
    }
    
     public function destroy($id)
    {
        $denuncias = Denuncia::find($id);
        $denuncias->delete();
    
        
        return back()->with('info', ' La denuncia fue eliminada correctamente!');
    }
}
