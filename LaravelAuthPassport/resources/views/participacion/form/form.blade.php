{{--  Nombre encuesta  --}}
<div class="form-group row">



    <div class="col-md-8 offset-md-2">
        {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'id' => 'nombre','placeholder' => 'Nombre encuesta' ]) !!}

    </div>

</div>


{{--  Preguntas  --}}
<div class="form-group row">



    <div class="col-md-8 offset-md-2">
        {!! Form::text('pregunta', old('pregunta'), ['class' => 'form-control', 'id' => 'pregunta','placeholder' => 'Pregunta' ]) !!}

    </div>

</div>

<div class="row">
 <div class="col-md-8 offset-md-2">
<h6>Ingrese posibles respuestas</h6>
<br>
 </div>
</div>

{{--  Respuestas --}}
<div class="form-group row ">

     <div class="col-md-1 offset-md-2" style="">
     <a href=""><i class="fas fa-plus-circle" style="font-size:20px"></i></a>
    
    </div>
    <div class="col-md-7">
       
        {!! Form::text('respuestas', old('respuestas'), ['class' => 'form-control', 'id' => 'respuestas','placeholder' => 'Respuestas' ]) !!}

    </div>

</div>


<div class="row">
 <div class="col-md-8 offset-md-2">
<h6>Cuántas respuestas son aceptadas</h6>
<br>
 </div>
</div>

<div class="row">
 <div class="col-md-8 offset-md-2">
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio">Respuesta única
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio">Más de una respuesta
  </label>
</div>
   
    </div>
   
</div>