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
                           <!----> <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">InfoMapa</h1>
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
<div class="content">
               <div class="block block-rounded block-bordered">
  <div class="block-header block-header-default">
            <h3 class="block-title">Registro de lugares de interes<small></small></h3>
            <br>
             @include('infomapa.form.info')
           
            </div>
             <div class="block-content block-content-full">
        <table  id="tablamapa" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">#</th>
                                        <th>Nombre</th>
                                        <th>Horario</th>
                                        <th>Contacto</th>
                                        <th>Página web</th>
                                        <th>Tipo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($mapas as $map)
                                <tr>
                                   <td>{{$map->id}}</td>
                                    <td>{{$map->titulo}}</td>
                                   <td>{{$map->dia_inicio}} a {{$map->dia_termino}}, {{$map->horario_apertura}} - {{$map->horario_cierre}}</td>
                                    <td>{{$map->contacto}}</td>
                                    <td>{{$map->paginaweb}}</td>
                                    <td>{{$map->tipo}}</td>
                                    <td><div class="dropdown">
                                        <a role="button" class="btn dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-bars text-primary"></i>  
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-default-primary">
                                        <a class="dropdown-item edit"  id="estado" href="{{ route('infomapa.edit',$map->id)}}">Editar</a>
                                           <div class="dropdown-divider"></div>
                                            <form action="{{ route('infomapa.destroy', $map->id)}}" method="post">
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

@endsection
 @section('js_after') 
                   
{{-- inicio Datatable --}}
    <script src=" {{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <script src=" {{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
   


<script>
    
        $(document).ready(function(){

        $("#tablamapa").dataTable({
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

/*
        $(document).ready(function() {

          var table = $('#tablareportes').DataTable({
                      "deferRender": true,
                      "retrieve": true,
                      "processing": true,
                      'paging': true,
                      'info': false,
                      'filder': true,
                      'startSave': true,
                      'serverSide':   true,
                      'AutoWidth': false,

                      'ajax':{
                            'url': "{!! route('ParticipacionControllerGetData') !!}"
                      },
                      'columns':[
                          { data: 'id' },
                          { data: 'nombre' },
                          { data: 'estado',
                            render: function(data, type, row){
                                if(data === 'activada')
                                    {
                                        return '<td><span class="badge badge-success">'+data+'</span></td>';
                                    }
                                else{
                                    return '<td><span class="badge badge-danger">'+data+'</span></td>';
                                }
                            } },
                          { data: 'created_at'},
                                { "ordertable":false,
                                  "render":function(data, type, row){

                                    return  '<div class="dropdown">'+
                                        '<a role="button" class="btn dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                        '<i class="fa fa-fw fa-bars text-primary"></i>'+  
                                        '</a>' +
                                        '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-default-primary">'+
                                        '<a class="dropdown-item detail" id="show">Ver detalle</a>'+
                                        '<a class="dropdown-item edit"  id="estado">Cambiar estado</a>'+
                                        '<div class="dropdown-divider"></div>'+
                                        '<a class="dropdown-item"  id="delete" data-toggle="modal" data-target="#reportes_destroy">Eliminar</a>'+    
                                        '</div>'+

                                        '</div>'
                                  }
                          }
                      ],

                      

                      'language':
                          {
                              'sProcessing':     'Procesando...',
                              'sLengthMenu':     'Mostrar _MENU_ registros',
                              'sZeroRecords':    'No se encontraron resultados',
                              'sEmptyTable':     'Ningún dato disponible en esta tabla',
                              'sInfo':           'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
                              'sInfoEmpty':      'Mostrando registros del 0 al 0 de un total de 0 registros',
                              'sInfoFiltered':   '(filtrado de un total de _MAX_ registros)',
                              'sInfoPostFix':    '',
                              'sSearch':         'Buscar Categoria: ',
                              'sUrl':            '',
                              'sInfoThousands':  ',',
                              'sLoadingRecords': 'Cargando...',
                              'oPaginate': {
                                  'sFirst':    'Primero',
                                  'sLast':     'Último',
                                  'sNext':     'Siguiente',
                                  'sPrevious': 'Anterior'
                              },
                              'oAria': {
                                  'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
                                  'sSortDescending': ': Activar para ordenar la columna de manera descendente'
                              }
                          }
                });
            
            
             $('#tablareportes tbody').on("click","a#show", function(){
                var data = table.row( $(this).parents("tr") ).data();
                //alert('Mensaje de prueba: hacer vista de repuesto');
                location.href="participacion/"+data.id;
                })
            
            $('#tablareportes tbody').on("click","a#delete", function(){
                var data = table.row( $(this).parents("tr") ).data();
                //alert('Mensaje de prueba: hacer eliminar repuesto');

                $("#id").val(data.id);
               
                console.log(data.id);


                var direction = "participacion/"+data.id;
                $("#from").attr('action',direction)
                })

                $('#tablareportes tbody').on("click","a#estado", function(){
                var data = table.row( $(this).parents("tr") ).data();
                //alert('Mensaje de prueba: hacer vista de repuesto');
                location.href="participacion-estado/"+data.id;
                })
            
        });
*/

</script>
{{-- Fin Datatable --}}


@endsection