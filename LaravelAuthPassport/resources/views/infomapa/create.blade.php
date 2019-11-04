@extends('layouts.maps')
@section('content')

<script src="{{asset('js/plugins/jquery/jquery.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc41gxjt-3ulYIBUekMCL4kKAgkhn6JYM&callback=initMap4&libraries=places"></script>
     
              <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Nuevo lugar</h1>
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
         <h3 class="block-title">Crear un nuevo lugar</h3>
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
      <form action="{{route('infomapa.store')}}" method="POST">
            @csrf
       
            <div class="form-group">
               <label for="">Nombre</label>
               <input type="text" name="title" class="form-control input-sm">
                
            </div>
            <div class="form-group">
               <label for="">Horario</label>
               <input type="text" name="horario" class="form-control input-sm">
                
            </div>
            <div class="form-group">
               <label for="">Contacto</label>
               <input type="text" name="contacto" class="form-control input-sm">
                
            </div>
            <div class="form-group">
               <label for="">Pagina web</label>
               <input type="text" name="paginaweb" class="form-control input-sm">
                
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
               <input type="text" name="lat" id="lat" class="form-control input-sm">
                
            </div>
            <div class="form-group" style="display:none">
               <label for="">Lng</label>
               <input type="text" name="lng" id="lng" class="form-control input-sm">
                
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

@endsection