@extends('layouts.backend')
@section('css_before')
         <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

           

                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                           <!----> <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Emprendedores</h1>
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
               <div class="block block-rounded block-bordered">
  <div class="block-header block-header-default">
            <h3 class="block-title">Emprendedores registrados<small></small></h3>
              @include('emprende.form.info')
            </div>
             <div class="block-content block-content-full">
        <table  id="tablaemprende" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">#</th>
                                        <th>Nombre</th>
                                        <th>Contacto</th>
                                        <th>Correo</th>
                                        <th>Dirección</th>
                                        <th>Horario</th>
                                        <th>Descripción</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($servicios as $servicio)
                                <tr>
                                  <td>{{$servicio->id}}</td>
                                   <td>{{$servicio->nombre}}</td>
                                    <td>{{$servicio->contacto}}</td>
                                    <td>{{$servicio->correo}}</td>
                                     <td>{{$servicio->direccion}}</td>
                                     
                                      <td>{{$servicio->dia_inicio}} a {{$servicio->dia_termino}}, {{$servicio->horario_apertura}} - {{$servicio->horario_cierre}}</td>
                                <td>{{$servicio->descripcion_servicio}}</td>
                                    
                                    <td><div class="dropdown">
                                        <a role="button" class="btn dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-bars text-primary"></i>  
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-default-primary">
                                        <a class="dropdown-item edit"  id="estado" href="{{ route('emprende.edit',$servicio->id)}}">Editar</a>
                                        <div class="dropdown-divider"></div>
                                            
                                         <form action="{{ route('emprende.destroy', $servicio->id)}}" method="post">
                                            @csrf
                                          @method('DELETE')
                                          <button type="submit" class="dropdown-item" id="delete">Eliminar</button></form>      
                                        </div>

                                        </div></td>
                                </tr>
                                @endforeach
                                
            </tbody>
    </table>
    </div>
</div>
</div>
                <!-- END Page Content -->

         
@endsection
 @section('js_after') 
                   
{{-- inicio Datatable --}}
    <script src=" {{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <script src=" {{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
   
   <script>
        $(document).ready(function(){

        $("#tablaemprende").dataTable({
                  pageLength: 5,
                  lengthMenu: [[5, 10, 20], [5, 10, 20]],
                  autoWidth: !1,
                  language:{
                        url: "{{ asset('js/plugins/datatables/spanish.json') }}",
                    },
                info: false,
                responsive: true,
                searching: true,
                });
    });

</script> 


@endsection


