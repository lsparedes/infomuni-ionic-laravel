@extends('layouts.backend')
@section('content')

                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Nuevo usuario</h1>
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
                            <h3 class="block-title">Crear un nuevo usuario</h3>
                        </div>
                        <!-- Block Tabs Default Style -->
                            <div class="block block-rounded block-bordered">
                               
                                <div class="block-content tab-content">
                                   
                                           <form action="{{route('users.store')}}" method="POST">
                               @csrf
                                <!-- Basic Elements -->
                                  @include('users.form.info')
                                <h2 class="content-heading pt-0">Ingreso de información</h2>
                                <div class="row push">
                                    <div class="col-lg-4">

                                        <p class="text-muted">
                                            Al crear un usuario, automaticamente el correo es asignado como la nueva contraseña, para que posteriormente pueda ser modificada.
                                        </p>

                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <div class="form-group">
                                            <label for="example-text-input">Nombre</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre usuario">
                                             @if ($errors->has('nombre'))
                                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Correo</label>
                                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" placeholder="Correo usuario">
                                              @if ($errors->has('correo'))
                                            <div class="invalid-feedback">{{ $errors->first('correo') }}</div>
                                            @endif
                                        </div>
                                      
                                         <button type="submit" class="btn btn-sm btn-outline-danger btn-block">Guardar usuario</button>
                                          <!--<button type="submit" class="btn btn-block btn-hero-primary btn-block btn-hero-sm">
                                              Guardar emprendedor
                                          </button>-->
                                    </div>
                                </div>
                            </form>
                                
                                    
                                </div>
                            </div>
                            <!-- END Block Tabs Default Style -->
                      <!--  <div class="block-content">
                          
                        </div>-->
                        
                    </div>
</div>

@endsection

