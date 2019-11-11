<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;
use Image;

class ControllerCalendar extends Controller
{
    
    
    
    public function form(){
        
            return view("eventos/evento/form");
        }
    

   public function create(Request $request){

       $ruta = public_path().'/img/eventos/';
        $imagenOriginal = $request->file('image');
        $imagen = Image::make($imagenOriginal);
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
        //$imagen->resize(300,300);
        $imagen->save($ruta . $temp_name, 100);

      Evento::insert([
        'nombre'       => $request->input("titulo"),
        'lugar'  => $request->input("lugar"),
        'fecha'        => $request->input("fecha"),
        //'hora' => $request->input("hora"),
        'descripcion'        => $request->input("descripcion"),
        'imagen'  => $temp_name,
        'users_id' => auth()->id(),
      ]);

      return back()->with('success', 'Evento creado exitosamente!');
         
                        

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
    
     public function details($id){

      $event = Evento::find($id);

      return view("eventos/evento/evento",[
        "event" => $event
      ]);

    }
    /////////////calendario///////////////////////
     public function index(){

       $month = date("Y-m");
       //
       $data = $this->calendar_month($month);
       $mes = $data['month'];
       // obtener mes en espanol
       $mespanish = $this->spanish_month($mes);
       $mes = $data['month'];

       return view("eventos/index",[
         'data' => $data,
         'mes' => $mes,
         'mespanish' => $mespanish
       ]);

  }
    
     public function index_month($month){

    $data = $this->calendar_month($month);
      $mes = $data['month'];
      // obtener mes en espanol
      $mespanish = $this->spanish_month($mes);
      $mes = $data['month'];

      return view("eventos/index",[
        'data' => $data,
        'mes' => $mes,
        'mespanish' => $mespanish
      ]);

    }
    
    public static function calendar_month($month){
      //$mes = date("Y-m");
      $mes = $month;
      //sacar el ultimo de dia del mes
      $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
      //sacar el dia de dia del mes
      $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
      $daysmonth  =  date("d", strtotime($fecha));
      $montmonth  =  date("m", strtotime($fecha));
      $yearmonth  =  date("Y", strtotime($fecha));
      // sacar el lunes de la primera semana
      $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
      $diaDeLaSemana = date("w", $nuevaFecha);
      $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
      $dateini = date ("Y-m-d",$nuevaFecha);
      //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
      // numero de primer semana del mes
      $semana1 = date("W",strtotime($fecha));
      // numero de ultima semana del mes
      $semana2 = date("W",strtotime($daylast));
      // semana todal del mes
      // en caso si es diciembre
      if (date("m", strtotime($mes))==12) {
          $semana = 5;
      }
      else {
        $semana = ($semana2-$semana1)+1;
      }
      // semana todal del mes
      $datafecha = $dateini;
      $calendario = array();
      $iweek = 0;
      while ($iweek < $semana):
          $iweek++;
          //echo "Semana $iweek <br>";
          //
          $weekdata = [];
          for ($iday=0; $iday < 7 ; $iday++){
            // code...
            $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
            $datanew['mes'] = date("M", strtotime($datafecha));
            $datanew['dia'] = date("d", strtotime($datafecha));
            $datanew['fecha'] = $datafecha;
            //AGREGAR CONSULTAS EVENTO
            $datanew['evento'] = Evento::where("fecha",$datafecha)->get();

            array_push($weekdata,$datanew);
          }
          $dataweek['semana'] = $iweek;
          $dataweek['datos'] = $weekdata;
          //$datafecha['horario'] = $datahorario;
          array_push($calendario,$dataweek);
      endwhile;
      $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
      $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
      $month = date("M",strtotime($mes));
      $yearmonth = date("Y",strtotime($mes));
      //$month = date("M",strtotime("2019-03"));
      $data = array(
        'next' => $nextmonth,
        'month'=> $month,
        'year' => $yearmonth,
        'last' => $lastmonth,
        'calendar' => $calendario,
      );
      return $data;
    }
    
    public static function spanish_month($month)
    {

        $mes = $month;
        if ($month=="Jan") {
          $mes = "Enero";
        }
        elseif ($month=="Feb")  {
          $mes = "Febrero";
        }
        elseif ($month=="Mar")  {
          $mes = "Marzo";
        }
        elseif ($month=="Apr") {
          $mes = "Abril";
        }
        elseif ($month=="May") {
          $mes = "Mayo";
        }
        elseif ($month=="Jun") {
          $mes = "Junio";
        }
        elseif ($month=="Jul") {
          $mes = "Julio";
        }
        elseif ($month=="Aug") {
          $mes = "Agosto";
        }
        elseif ($month=="Sep") {
          $mes = "Septiembre";
        }
        elseif ($month=="Oct") {
          $mes = "Octubre";
        }
        elseif ($month=="Oct") {
          $mes = "December";
        }
        elseif ($month=="Dec") {
          $mes = "Diciembre";
        }
        else {
          $mes = $month;
        }
        return $mes;
    }
    
       public function destroy($id)
    {
        $eventos = Evento::find($id);
        $eventos->delete();
        $mi_imagen = public_path().'/img/eventos/'.$eventos->imagen;
           
        if (@getimagesize($mi_imagen)) {
            //echo "El archivo existe";
            unlink($mi_imagen);
        }
        
           
        return redirect()->route('eventos.index')
                        ->with('info', 'El evento '.$eventos->nombre.' fue eliminado correctamente');
    }
        public function update(Request $request, $id)
    {
        $eventos = Evento::find($id);
            
   
 
        if($request->image==null){
            
            $eventos->nombre = $request->titulo;
            $eventos->lugar = $request->lugar;
            $eventos->fecha = $request->fecha;
            //$eventos->hora = $request->$hora;
            $eventos->descripcion = $request->descripcion;
            $eventos->users_id = auth()->id();
            $eventos->save();
        }
        else{
        $ruta = public_path().'/img/eventos/';
        $imagenOriginal = $request->file('image');
        $imagen = Image::make($imagenOriginal);
        $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
        //$imagen->resize(300,300);
        $imagen->save($ruta . $temp_name, 100);
            
            $eventos->nombre = $request->titulo;
            $eventos->lugar = $request->lugar;
            $eventos->fecha = $request->fecha;
            //$eventos->hora = $request->$hora;
            $eventos->descripcion = $request->descripcion;
            $eventos->imagen = $temp_name;
            $eventos->users_id = auth()->id();
            $eventos->save();
        }
        
    
        return redirect()->route('eventos.index')
                        ->with('info', 'El evento '.$eventos->nombre.' fue modificado correctamente');
    }
    
     public function edit($id)
    {
          $eventos = Evento::find($id);
         
        
        //dd($horarioa1,"/",$horarioa2);
        return view('eventos.edit', compact('eventos'));
    }
}
