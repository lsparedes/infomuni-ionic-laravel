@extends('layouts.backend')
@section('content')
<!-- Hero -->
<div class="bg-body-light">
   <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
         <!----> 
         <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Editar encuesta</h1>
         <!-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Blocks</li>
                <li class="breadcrumb-item active" aria-current="page">Options</li>
            </ol>
            </nav>-->
      </div>
   </div>
</div>
<!-- END Hero -->
<!-- Page Content -->
<div class="content">
   <!-- Elements -->
   <div class="block block-rounded block-bordered">
      <div class="block-header block-header-default">
         <h3 class="block-title">Editar encuesta</h3>
      </div>
      <div class="block-content">
         <form method="POST" action="#">
            @csrf
            <!-- Basic Elements -->
            @include('emprende.form.info')
            <h2 class="content-heading pt-0">Información</h2>
            <div class="row push">
               <div class="col-lg-4">
                  <p class="text-muted">
                     Modificar preguntas y respuestas que formaran parte de esta encuesta:
                  </p>
               </div>
               <div class="col-lg-8 col-xl-5">
                  <div class="form-group">
                     <label for="example-text-input">Nombre encuesta</label>
                     <input type="text" name="encuesta" id="encuesta" placeholder="Nombre encuesta" class="form-control" value="{{ $encuestas->nombre }}">
                  </div>
                      <div id="pr_0">
                     <div class="form-group">
                        <label for="">Preguntas y respuestas</label>
                        <ol>
                        @foreach ($preguntas as $pregunta)
                        <li>   <input type="text" name="preguntas" id="preguntas" placeholder="Pregunta" class="form-control" value="{{$pregunta->pregunta}}"></li>
                         <br>
                        @foreach ($respuestas as $respuesta)
                        @if ($pregunta->id == $respuesta->id_preguntas)
                       <div class="tr_0">
                        <input type="text" name="valorr[]" id="valorr[]" value="0" style="display:none">
                       <input class="form-control" type="text" name="respuestas[]" id="respuestas[]" value="{{$respuesta->respuesta}}">
                      </div>
                       <br>
                        @endif
                        @endforeach
                             <div class="form-group">
                     <label for="">Respuestas aceptadas</label>
                     <br>
                    
                          <fieldset id="radio1">
                         <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="cantidad_respuestas" name="cantidad_respuestas" value="{{$pregunta->tipo}}" checked>
                        <label class="form-check-label" for="customRadio">Respuesta única</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="cantidad_respuestas" name="cantidad_respuestas" value="{{$pregunta->tipo}}">
                        <label class="form-check-label" for="customRadio2">Más de una respuesta</label>
                     </div>
                                 </fieldset>
                    
                  
                  </div>
                        @endforeach
                        
                         </ol>
                     </div>
                   </div>
               
             
                  <center>
                     <input class=" btn btn-outline-danger btn-sm" name="otra" type="submit" value="Guardar cambios">
                     
                  </center>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection