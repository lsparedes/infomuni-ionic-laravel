@extends('layouts.backend')
@section('content')

                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Editar usuario</h1>
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
                            <h3 class="block-title">Editar un usuario</h3>
                        </div>
                        <!-- Block Tabs Default Style -->
                            <div class="block block-rounded block-bordered">
                               
                                <div class="block-content tab-content">
                                   
                                           <form action="{{ route('UpdateProfile', Auth::user()->id)}}" method="POST">
                                  
                                 @csrf
                           
                               
                                <!-- Basic Elements -->
                                  @include('users.form.info')
                                <h2 class="content-heading pt-0">Ingreso de información</h2>
                                <div class="row push">
                                  <div class="col-lg-4">
                                   <p class="text-muted">
                                            Modifica aquí tus datos de perfil
                                        </p>
                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <div class="form-group">
                                            <label for="example-text-input">Nombre</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{Auth::user()->name}}">
                                             @if ($errors->has('name'))
                                             <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                             @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Correo</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{Auth::user()->email}}">
                                            @if ($errors->has('email'))
                                             <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                             @endif
                                        </div>
                                        
                                      <!--  <div class="form-group">
                                            <label for="example-email-input">Contraseña actual</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña actual">
                                        </div>-->
                                        <div class="form-group">
                                            <label for="example-email-input">Nueva contraseña</label>
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="Nueva contraseña">
                                            @if ($errors->has('new_password'))
                                             <div class="invalid-feedback">{{ $errors->first('new_password') }}</div>
                                             @endif
                                        </div>
                                      
                                        <!-- <div class="form-group">
                                            <label for="example-email-input">Confirmar nueva contraseña</label>
                                            <input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm" placeholder="Confirmar nueva contraseña">
                                        </div>
                                      -->
                                         <button type="submit" class="btn btn-sm btn-outline-danger btn-block">Modificar mi perfil</button>
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

