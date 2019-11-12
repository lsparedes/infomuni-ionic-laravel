@extends('layouts.backend')
@section('css_before')

<link href="https://rawgit.com/tempusdominus/bootstrap-4/master/build/css/tempusdominus-bootstrap-4.css" rel="stylesheet"/>
@endsection
@section('content')

                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Editar emprendedor</h1>
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
                
                 <!-- Page Content -->
                <div class="content">
                      
                    <!-- Elements -->
                    <div class="block block-rounded block-bordered">
                       
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Editar emprendedor</h3>
                        </div>
                        <!-- Block Tabs Default Style -->
                            <div class="block block-rounded block-bordered">
                                <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#btabs-static-home">Edición</a>
                                    </li>
            
                                   
                                </ul>
                                <div class="block-content tab-content">
                                    <div class="tab-pane active" id="btabs-static-home" role="tabpanel">
                                           <form action="{{ route('emprende.update', $servicios->id)}}" method="POST">
                                
                               @csrf
                               @method('PATCH') 
                                <!-- Basic Elements -->
                                 
                                <h2 class="content-heading pt-0">Ingreso de información</h2>
                                <div class="row push">
                                    <div class="col-lg-4">

                                        <p class="text-muted">
                                            Complete la siguiente información
                                        </p>

                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <div class="form-group">
                                            <label for="example-text-input">Nombre servicio</label>
                                            <input type="text" class="form-control" id="nombre_servicio" name="nombre" placeholder="Nombre servicio" value="{{$servicios->nombre}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del servicio" value="{{$servicios->direccion}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-password-input">Contacto</label>
                                            <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto" value="{{$servicios->contacto}}">
                                        </div>
                                            <div class="form-group">
                                            <label for="example-password-input">Correo</label>
                                            <input type="email" class="form-control" id="correo" name="correo" value="{{$servicios->correo}}">
                                        </div>
                                                 <div class="form-group row">
                                          <label for="example-password-input" class="col-lg-12">Atención</label>
                                          <br>
                                          <br>
                                          <div class="col-lg-3 col-xl-3">
                                          <span>Días</span>
                                             
                                          </div>
                                          <div class="col-lg-4 col-xl-4">
                                             @if($servicios->dia_inicio=="Lunes")
                                              <select class="form-control" id="dia_inicio" name="dia_inicio">
                                                <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                               @if($servicios->dia_inicio=="Martes")
                                              <select class="form-control" id="dia_inicio" name="dia_inicio">
                                                 <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option>
                                                 <option value="Lunes">Lunes</option>
                                               
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                               @if($servicios->dia_inicio=='Miercoles')
                                              <select class="form-control" id="dia_inicio" name="dia_inicio">
                                                  <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                              
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                                 @if($servicios->dia_inicio=='Jueves')
                                              <select class="form-control" id="dia_inicio" name="dia_inicio">
                                                  <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                              
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                                  @if($servicios->dia_inicio=='Viernes')
                                              <select class="form-control" id="dia_inicio" name="dia_inicio">
                                                <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option>  
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                                                            
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                                     @if($servicios->dia_inicio=='Sabado')
                                              <select class="form-control" id="dia_inicio" name="dia_inicio">
                                                <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option> 
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>
                                                                                             
                                                
                                                
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              @endif
                                              @if($servicios->dia_inicio=='Domingo')
                                              <select class="form-control" id="dia_inicio" name="dia_inicio">
                                                <option value="{{$servicios->dia_inicio}}">{{$servicios->dia_inicio}}</option>          
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
                                                @if($servicios->dia_termino=='Lunes')
                                              <select class="form-control" id="dia_termino" name="dia_termino">
                                                <option value="{{$servicios->dia_termino}}">{{$servicios->dia_termino}}</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              
                                               @elseif($servicios->dia_termino=='Martes')
                                              <select class="form-control" id="dia_termino" name="dia_termino">
                                                <option value="{{$servicios->dia_termino}}">{{$servicios->dia_termino}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              
                                               @elseif($servicios->dia_termino=='Miercoles')
                                              <select class="form-control" id="dia_termino" name="dia_termino">
                                                    <option value="{{$servicios->dia_termino}}">{{$servicios->dia_termino}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                            
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                            
                                                 @elseif($servicios->dia_termino=='Jueves')
                                              <select class="form-control" id="dia_termino" name="dia_termino">
                                                  <option value="{{$servicios->dia_termino}}">{{$servicios->dia_termino}}</option>
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                              
                                                <option value="Viernes">Viernes</option>
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                           
                                                  @elseif($servicios->dia_termino=='Viernes')
                                              <select class="form-control" id="dia_termino" name="dia_termino">
                                                 <option value="{{$servicios->dia_termino}}">{{$servicios->dia_termino}}</option>  
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                                                           
                                                <option value="Sabado">Sabado</option>
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                             
                                                     @elseif($servicios->dia_termino=='Sabado')
                                              <select class="form-control" id="dia_termino" name="dia_termino">
                                                  <option value="{{$servicios->dia_termino}}">{{$servicios->dia_termino}}</option> 
                                                 <option value="Lunes">Lunes</option>
                                                  <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>
                                                                                           
                                                
                                                
                                                <option value="Domingo">Domingo</option>
                                              </select>
                                              
                                              @elseif($servicios->dia_termino=='Domingo')
                                              <select class="form-control" id="dia_termino" name="dia_termino">
                                                  <option value="{{$servicios->dia_termino}}">{{$servicios->dia_termino}}</option>                                              
                                                
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
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" value="{{$servicios->horario_apertura}}" autocomplete="off" name="horario_apertura"/>
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
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" value="{{$servicios->horario_cierre}}" autocomplete="off" name="horario_cierre"/>
                                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                    </div>
                                                    
                                        
                                          </div>
                                           
                                         
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="example-textarea-input" class="col-lg-12">Descripción</label>
                                           <div class="col-lg-12 col-xl-12">
                                        <textarea class="form-control" id="descripcion" name="descripcion_servicio" rows="4" placeholder="Descripción servicio">{{$servicios->descripcion_servicio}}</textarea>
                                            </div>
                                        </div>
                                      <!--  <div class="form-group">
                                            <label class="d-block" for="example-file-input">Cargar imagen</label>
                                            <input type="file" id="image" name="image" value="{{$servicios->imagen}}">
                                        </div>-->
                                         <button type="submit" class="btn btn-sm btn-outline-danger btn-block">Editar emprendedor</button>
                                          <!--<button type="submit" class="btn btn-block btn-hero-primary btn-block btn-hero-sm">
                                              Guardar emprendedor
                                          </button>-->
                                    </div>
                                </div>
                            </form>
                                    </div>
                                 
                                    
                                </div>
                            </div>
                            <!-- END Block Tabs Default Style -->
                      <!--  <div class="block-content">
                          
                        </div>-->
                        
                    </div>
</div>

@endsection
@section('js_after') 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
 <script src="https://rawgit.com/tempusdominus/bootstrap-4/master/build/js/tempusdominus-bootstrap-4.js"></script>
 <script type="text/javascript">
           $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
  
        </script>
        
    <script>

      $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'LT'
                });
            });
</script>


@endsection