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
                           <!----> <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Participación</h1>
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
            <h3 class="block-title">Registro de encuestas<small></small></h3>
              @include('participacion.form.info')
            </div>
             <div class="block-content block-content-full">
        <table  id="tablareportes" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">#</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($encuestas as $encuesta)
                                <tr>
                                   <td>{{$encuesta->id}}</td>
                                    <td>{{$encuesta->nombre}}</td>
                                     @if($encuesta->estado === 'activada')
                                       <td><span class="badge badge-success">{{$encuesta->estado}}</span></td>
                                    
                                    
                                    @else
                                    <td><span class="badge badge-danger">{{$encuesta->estado}}</span></td>
                                    @endif
                                    
                                    <td>{{$encuesta->created_at}}</td>
                                    <td><div class="dropdown">
                                        <a role="button" class="btn dropdown-toggle" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-fw fa-bars text-primary"></i>  
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-default-primary">
                                        <a class="dropdown-item detail" id="show" href="{{ route('participacion.show',$encuesta->id) }}">Ver detalle</a>
                                        <a class="dropdown-item edit"  id="estado" href="{{ route('estado',$encuesta->id) }}">Cambiar estado</a>
                                        <div class="dropdown-divider"></div>
                                            <form action="{{ route('participacion.destroy', $encuesta->id)}}" method="post">
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
{{-- Modal de Eliminar Repuesto --}}
  <div id="reportes_destroy" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button btn-lg" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body text-center">

                    <form id="from" action="" method="POST">

                        {{ csrf_field() }}
                      @method('DELETE')
                        <h5 class="card-title">¿Esta seguro de eliminar este registro  <strong id="name"></strong>?</h5>
                        <p class="mb-3">Al momento de eliminar el registro del sistema, no podrá acceder nuevamente y su información no
                            podrá ser rescatada.</p>

                        <button type="submit" class="btn bg-danger btn-block text-white">Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
{{-- Fin Modal Eliminar Repuesto --}}
@endsection
 @section('js_after') 
                   
{{-- inicio Datatable --}}
    <script src=" {{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <script src=" {{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
   


<script>
    
        $(document).ready(function(){

        $("#tablareportes").dataTable({
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