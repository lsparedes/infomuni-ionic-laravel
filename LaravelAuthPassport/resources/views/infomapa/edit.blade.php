@extends('layouts.maps')
@section('css_before')

<link href="https://rawgit.com/tempusdominus/bootstrap-4/master/build/css/tempusdominus-bootstrap-4.css" rel="stylesheet"/>
@endsection
@section('content')

<script src="{{asset('js/plugins/jquery/jquery.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc41gxjt-3ulYIBUekMCL4kKAgkhn6JYM&callback=initMap4&libraries=places"></script>
     
              <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Editar un lugar</h1>
                         <!--   <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Forms</li>
                                    <li class="breadcrumb-item active" aria-current="page">Elements</li>
                                </ol>
                            </nav>-->
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
              <div class="content">
              <div class="block block-rounded block-bordered">
      <div class="block-header block-header-default">
         <h3 class="block-title">Editar un nuevo lugar</h3>
           <br>
            @include('infomapa.form.info')
      </div> 
      <div class="block-content">
       <h2 class="content-heading pt-0">Ingreso de información</h2>
       <div class="row push">
                                    <div class="col-lg-4">

                                        <p class="text-muted">
                                            Complete la siguiente información
                                        </p>

                                    </div>
                                    <div class="col-lg-8 col-xl-5">  
      <form action="{{ route('infomapa.update', $mapa->id)}}" method="POST">
             @csrf
             @method('PATCH')
       
            <div class="form-group">
               <label for="">Nombre</label>
               <input type="text" name="title" class="form-control input-sm" value="{{$mapa->titulo}}">
                
            </div>
                     <div class="form-group row">
                     <label for="example-password-input" class="col-lg-12">Atención</label>
                                          <br>
                                          <br>
                                              <div class="col-lg-3 col-xl-3">
                                          <span>Días</span>
                                             
                                          </div>
                                              <div class="col-lg-4 col-xl-4">
                                             @if($mapa->dia_inicio=="Lunes")
                                              <select class="form-control" id="dias1" name="dias1">
                                                <option value="{{$mapa->dia_inicio}}">{{$mapa->dia_inicio}}</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                               @if($mapa->dia_inicio=="Martes")
                                              <select class="form-control" id="dias1" name="dias1">
                                                 <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option>
                                                 <option value="Lunes">Lunes</option>
                                               
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                               @if($mapa->dia_inicio=='Miercoles')
                                              <select class="form-control" id="dias1" name="dias1">
                                                  <option value="{{$mapa->dia_inicio}}">{{$mapa->dia_inicio}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                              
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                                 @if($mapa->dia_inicio=='Jueves')
                                              <select class="form-control" id="dias1" name="dias1">
                                                  <option value="{{$mapa->dia_inicio}}">{{$mapa->dia_inicio}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                              
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                                  @if($mapa->dia_inicio=='Viernes')
                                              <select class="form-control" id="dias1" name="dias1">
                                                <option value="{{$mapa->dia_inicio}}">{{$mapa->dia_inicio}}</option>  
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                                                            
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                                     @if($mapa->dia_inicio=='Sabado')
                                              <select class="form-control" id="dias1" name="dias1">
                                                <option value="{{$mapa->dia_inicio}}">{{$mapa->dia_inicio}}</option> 
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>
                                                                                             
                                                
                                                
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                              @if($mapa->dia_inicio=='Domingo')
                                              <select class="form-control" id="dias1" name="dias1">
                                                <option value="{{$mapa->dia_inicio}}">{{$mapa->dia_inicio}}</option>          
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>      
                                                <option value="Sabado">Sabado</option>
                                                                                    
                                                
                                              
                                              </select>
                                              @endif
                                          </div>
                                          <div class="col-lg-1 col-xl-1">
                                              <span>a</span>
                                          </div>
                                           <div class="col-lg-4 col-xl-4">
                                                @if($mapa->dia_termino=='Lunes')
                                              <select class="form-control" id="dias2" name="dias2">
                                                <option value="{{$mapa->dia_termino}}">{{$mapa->dia_termino}}</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              
                                               @elseif($mapa->dia_termino=='Martes')
                                              <select class="form-control" id="dias2" name="dias2">
                                                <option value="{{$mapa->dia_termino}}">{{$mapa->dia_termino}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              
                                               @elseif($mapa->dia_termino=='Miercoles')
                                              <select class="form-control" id="dias2" name="dias2">
                                                    <option value="{{$mapa->dia_termino}}">{{$mapa->dia_termino}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                            
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                            
                                                 @elseif($mapa->dia_termino=='Jueves')
                                              <select class="form-control" id="dias2" name="dias2">
                                                  <option value="{{$mapa->dia_termino}}">{{$mapa->dia_termino}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                              
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                           
                                                  @elseif($mapa->dia_termino=='Viernes')
                                              <select class="form-control" id="dias2" name="dias2">
                                                 <option value="{{$mapa->dia_termino}}">{{$mapa->dia_termino}}</option>  
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                                                           
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                             
                                                     @elseif($mapa->dia_termino=='Sabado')
                                              <select class="form-control" id="dias2" name="dias2">
                                                  <option value="{{$mapa->dia_termino}}">{{$mapa->dia_termino}}</option> 
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>
                                                                                           
                                                
                                                
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              
                                              @elseif($mapa->dia_termino=='Domingo')
                                              <select class="form-control" id="dias2" name="dias2">
                                                  <option value="{{$mapa->dia_termino}}">{{$mapa->dia_termino}}</option>                                              
                                                
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>      
                                                <option value="Sabado">Sabado</option>
                                              
                                              
                                              </select>
                                              @endif
                                          </div>
                                           <div class="col-lg-3 col-xl-3">
                                           <br>
                                           
                                          <span>Horario</span>
                                             
                                          </div>
                                          <div class="col-lg-4 col-xl-4">
                                                 <br>
                                     
                                                  <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" value="{{$mapa->horario_apertura}}" autocomplete="off" name="horarioapertura"/>
                                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                    </div>
                                                </div>
                                          </div>
                                          <div class="col-lg-1 col-xl-1">
                                              <br>
                                              <span>a</span>
                                          </div>
                                        <div class="col-lg-4 col-xl-4">
                                              <br>
                                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" value="{{$mapa->horario_cierre}}" autocomplete="off" name="horariocierre"/>
                                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                    </div>
                                                    
                                        
                                          </div>
                                           
                                         
                                        </div>
                                        </div>
          
            <div class="form-group">
               <label for="">Contacto</label>
               <input type="text" name="contacto" class="form-control input-sm" value="{{$mapa->contacto}}">
                
            </div>
            <div class="form-group">
               <label for="">Pagina web</label>
               <input type="text" name="paginaweb" class="form-control input-sm" value="{{$mapa->paginaweb}}">
                
            </div>
            <div class="form-group">
                <label for="">Tipo</label>
                  @if($mapa->tipo=="municipales")
                <select class="form-control" id="tipo" name="tipo">
                 
                    <option value="{{$mapa->tipo}}">{{$mapa->tipo}}</option>
                    <option value="emergencias">servicios de emergencias</option>
                    <option value="turisticos">lugares turisticos</option>
                   
                </select>
                @endif
                  @if($mapa->tipo=="emergencias")
                <select class="form-control" id="tipo" name="tipo">
                 
                    <option value="{{$mapa->tipo}}">{{$mapa->tipo}}</option>
                    <option value="municipales">servicios municipales</option>
                    <option value="turisticos">lugares turisticos</option>
                   
                </select>
                @endif
                   @if($mapa->tipo=="turisticos")
                <select class="form-control" id="tipo" name="tipo">
                 
                    <option value="{{$mapa->tipo}}">{{$mapa->tipo}}</option>
                     <option value="emergencias">servicios de emergencias</option>
                    <option value="municipales">servicios municipales</option>
                   
                   
                </select>
                @endif
            </div>
            <div class="form-group">
               <label for="">Buscar lugar</label>
               <input type="text" class="form-control input-sm" id="searchmap">
               <br>
              
               <div id="map-canvas" style="width:560px;height:250px">
                   
               </div>
                
            </div>
            <div class="form-group" style="display:none">
               <label for="">Lat</label>
               <input type="text" name="lat" id="lat" class="form-control input-sm" value="{{$mapa->lat}}">
                
            </div>
            <div class="form-group" style="display:none">
               <label for="">Lng</label>
               <input type="text" name="lng" id="lng" class="form-control input-sm" value="{{$mapa->lng}}">
                
            </div>
             <button type="submit" class="btn btn-sm btn-outline-danger btn-block">Guardar lugar</button>
        </form>
           </div>
          </div>
                  </div>
          </div>
</div>


@endsection
@section('js_after')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
 <script src="https://rawgit.com/tempusdominus/bootstrap-4/master/build/js/tempusdominus-bootstrap-4.js"></script>
   
   <script>

       function initMap4() {
        
           var map = new google.maps.Map(document.getElementById('map-canvas'), {
             zoom: 15,
             center: {lat: -36.786790, lng: -73.106538} //centro del mapa al cargar
           });
             
           var marker = new google.maps.Marker({
             position:{
                lat: -36.786790,
                lng:  -73.106538
             },
             map:map,
             draggable:true
           });
             
            var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
  
            google.maps.event.addListener(searchBox, 'places_changed', function(){
                
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;
                
                for(i=0; place=places[i];i++){
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }
                
                map.fitBounds(bounds);
                map.setZoom(15);
            });
             
            google.maps.event.addListener(marker, 'position_changed', function(){
               
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                
                $('#lat').val(lat);
                $('#lng').val(lng);
            });
         }
       
       window.onload = () => {
    initMap4()
}

</script>
 <script type="text/javascript">
           $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT',
                    locale: 'es',
                    sideBySide: true
                });
            });
  
        </script>
        
    <script>

      $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'LT',
                    locale: 'es',
                    sideBySide: true
                });
            });
</script>

@endsection