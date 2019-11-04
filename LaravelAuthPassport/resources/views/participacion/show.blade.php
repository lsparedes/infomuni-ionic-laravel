@extends('layouts.backend')
@section('content')
             <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                           <!----> <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Detalle de encuesta</h1>
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
                    <!-- Your Block -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"> {{$encuestas->nombre}}</h3>
                        </div>
                        <div class="block-content">
                                    <ol>
                           @foreach ($pregs as $preg)
                           
                           <li>Pregunta: {{$preg->pregunta}}</li>
                           <br>
                           <ul>
                           @foreach($resps as $resp)
                           
                           @if($resp->preguntas_id == $preg->id)
                           
                               <li>{{$resp->respuesta}}</li>
                           
                           
                           @endif
                           
                           @endforeach
                           </ul>
                           <br>
                           @endforeach
                           </ol>
                           
                        </div>
                    </div>
                    <!-- END Your Block -->
                </div>


@endsection