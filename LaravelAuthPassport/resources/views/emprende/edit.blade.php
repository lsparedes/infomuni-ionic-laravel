@extends('layouts.backend')
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
                                            <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" placeholder="Nombre servicio" value="{{$servicios->nombre}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del servicio" value="{{$servicios->direccion}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-password-input">Contacto</label>
                                            <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto" value="{{$servicios->contacto}}">
                                        </div>
                                          <div class="form-group row">
                                            <label for="example-password-input" class="col-lg-8">Horario apertura</label>
                                            <div class="col-lg-8 col-xl-7">
                                            <input type="number" class="form-control" id="horarioapertura" name="horarioapertura" placeholder="Horario apertura" value="{{$horarioa1}}">
                                            </div>
                                            <div class="col-lg-8 col-xl-5">
                                                <select class="form-control" id="tipohorario" name="tipohorario">
                                                @if($horarioa2=='Am')
                                                <option value="Am">{{$horarioa2}}</option>
                                                <option value="Pm">Pm</option>
                                                @endif
                                                @if($horarioa2=='Pm')
                                                <option value="Am">Am</option>
                                                <option value="Pm">{{$horarioa2}}</option>
                                                @endif
                                            </select>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                            <label for="example-password-input" class="col-lg-8">Horario cierre</label>
                                            <div class="col-lg-8 col-xl-7">
                                            <input type="number" class="form-control" id="horariocierre" name="horariocierre" placeholder="Horario cierre" value="{{$horarioc1}}">
                                            </div>
                                            <div class="col-lg-8 col-xl-5">
                                                <select class="form-control" id="tipohorario2" name="tipohorario2">
                                                @if($horarioc2=='Am')
                                                <option value="Am">{{$horarioc2}}</option>
                                                <option value="Pm">Pm</option>
                                                @endif
                                                @if($horarioc2=='Pm')
                                                <option value="Pm">{{$horarioc2}}</option>
                                                <option value="Am">Am</option>
                                                
                                                @endif
                                               
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="example-textarea-input">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripción servicio">{{$servicios->descripcion_servicio}}</textarea>
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