@extends('layouts.backend')
@section('css_before')

<link href="https://rawgit.com/tempusdominus/bootstrap-4/master/build/css/tempusdominus-bootstrap-4.css" rel="stylesheet"/>
@endsection
@section('content')
       <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Nuevo evento</h1>
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
                            <h3 class="block-title">Crear un nuevo evento</h3>
                        </div>
                                         <div class="block-content">
                             <form action="{{ asset('/Evento/create/') }}" method="post" enctype="multipart/form-data">
                               @csrf
                                <!-- Basic Elements -->
                                                            
                            @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                     <button type="button" class="close" data-dismiss="alert">×</button>
                                     <ul>
                                      @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                      @endforeach
                                     </ul>
                                    </div>
                                   @endif
                                   @if ($message = Session::get('success'))
                                   <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                      <strong>{{ $message }}</strong>
                                   </div>
                                   @endif
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
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre evento">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Lugar</label>
                                            <input type="text" class="form-control" id="lugar" name="lugar" placeholder="Lugar">
                                        </div>
                                           <div class="form-group">
                                            <label for="example-password-input">Fecha</label>
                                             
                                            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                                        </div>
                                    
                                   
                                        <div class="form-group">
                                            <label for="example-textarea-input">Descripción</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripción servicio"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block" for="example-file-input">Cargar imagen</label>
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
@section('js_after') 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
 <script src="https://rawgit.com/tempusdominus/bootstrap-4/master/build/js/tempusdominus-bootstrap-4.js"></script>
 <script type="text/javascript">
     
       $(function () {
                $('#datetimepicker2').datetimepicker({
                    format: 'L',
                    locale: 'es'
                });
            });
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'LT',
                    locale: 'es',
                    sideBySide: true
                });
            });
        </script>
  

@endsection