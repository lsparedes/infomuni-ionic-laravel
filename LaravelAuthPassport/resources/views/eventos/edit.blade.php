@extends('layouts.backend')
@section('content')
       <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Editar evento</h1>
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
                            <h3 class="block-title">Editar evento</h3>
                        </div>
                                         <div class="block-content">
                             <form action="{{ route('eventos.update', $eventos->id)}}" method="POST" enctype="multipart/form-data">
                               @csrf
                               @method('PATCH') 
                                <!-- Basic Elements -->
                           
                                <h2 class="content-heading pt-0">Información</h2>
                                <div class="row push">
                                    <div class="col-lg-4">

                                        <p class="text-muted">
                                            Complete la siguiente información
                                        </p>

                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <div class="form-group">
                                            <label for="example-text-input">Nombre evento</label>
                                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" placeholder="Nombre evento" value="{{$eventos->nombre}}">
                                              @if ($errors->has('titulo'))
                                                <div class="invalid-feedback">{{ $errors->first('titulo') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Lugar</label>
                                            <input type="text" class="form-control @error('lugar') is-invalid @enderror" id="lugar" name="lugar" placeholder="Lugar" value="{{$eventos->lugar}}">
                                            @if ($errors->has('lugar'))
                                                <div class="invalid-feedback">{{ $errors->first('lugar') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="example-password-input">Fecha</label>
                                            <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" placeholder="Fecha" value="{{$eventos->fecha}}">
                                             @if ($errors->has('fecha'))
                                                <div class="invalid-feedback">{{ $errors->first('fecha') }}</div>
                                            @endif
                                        </div>
                                   
                                        <div class="form-group">
                                            <label for="example-textarea-input">Descripción</label>
                                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4" placeholder="Descripción servicio" >{{$eventos->descripcion}}</textarea>
                                            @if ($errors->has('descripcion'))
                                                <div class="invalid-feedback">{{ $errors->first('descripcion') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                          <p>Imagen</p>
                                           <img src="{{ asset('img/eventos/'.$eventos->imagen)}}" width="100%">
                                           <br>
                                           <br>
                                            <label class="d-block" for="example-file-input">Cargar una nueva imagen</label>
                                            <input type="file" id="image" name="image">
                                        </div>
                                         <button type="submit" class="btn btn-sm btn-outline-danger btn-block">Guardar evento</button>
                                          <!--<button type="submit" class="btn btn-block btn-hero-primary btn-block btn-hero-sm">
                                              Guardar emprendedor
                                          </button>-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection