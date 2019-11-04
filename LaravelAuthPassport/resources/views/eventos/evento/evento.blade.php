@extends('layouts.backend')
@section('content')
             <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                           <!----> <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Evento</h1>
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
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Detalles evento</h3>
                                <div class="block-options" style="display:inherit">
                                          <form action="{{ route('eventos.destroy', $event->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                         <button type="submit" class="btn-block-option">
                                             <i class="far fa-fw fa-trash-alt"></i>
                                        </button>
                                          </form>
                                          
                                        <a href="{{ route('eventos.edit',$event->id)}}"><button type="button" class="btn-block-option">
                                           <i class="far fa-edit"></i>
                                           
                                        </button></a>
                                    </div>
                        </div>
                        <div class="block-content">
                                                
                                                 <div class="row">
                     <div class="col-3">
                     <img src="{{ asset('img/eventos/'.$event->imagen)}}" width="100%">

                     
                    </div>
                    <div class="col-9">
                          
                          <div class="h6 font-weight-bold text-gray-800"> {{ $event->nombre }}</div>
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"> {{ $event->fecha }}</div>
                      
                       
                    </div>
                    
                    <div class="col-12 mt-4">
                       <p class="text-xs mb-0 text-gray-700 text-uppercase"> {{ $event->descripcion }}</p>
                    </div>
                  
                  </div>
                        </div>
                    </div>
                    <!-- END Your Block -->
                </div>
                
               
   
      
               
  
@endsection