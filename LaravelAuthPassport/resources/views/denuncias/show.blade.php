@extends('layouts.backend')
@section('content')
             <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                           <!----> <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Denuncia</h1>
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
                            <h3 class="block-title">Detalles denuncias</h3>
                                
                        </div>
                        <div class="block-content">
                                                
                                                 <div class="row">
                     <div class="col-3">
                
                     
                    </div>
                    <div class="col-9">
                          
                          <div class="h6 font-weight-bold text-gray-800"> {{ $denuncias->name }}</div>
                            <div class="h6 font-weight-bold text-secondary"> {{ $denuncias->nombre }}</div>
                             <div class="h6 font-weight-bold text-secondary"> {{ $denuncias->estado }}</div>
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"> {{ $denuncias->created_at}}</div>
                      
                       
                    </div>
                    
                    <div class="col-12 mt-4">
                       <p class="text-xs mb-0 text-gray-700 text-uppercase"> {{ $denuncias->descripcion }}</p>
                    </div>
                  
                  </div>
                        </div>
                    </div>
                    <!-- END Your Block -->
                </div>
                
               
   
      
               
  
@endsection