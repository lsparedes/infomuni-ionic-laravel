@extends('layouts.backend')
@section('content')
    <style>
   
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #ffff;color:black;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>

   
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                           <!----> <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Eventos</h1>
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
                    <h2 class="content-heading">
                        Eventos registrados 
                         @include('emprende.form.info')
                        <!--<small>
                            <a href="be_blocks_api.html">Check out Block API</a>
                        </small>-->
                    </h2>
                    
</div>

      <div class="row">
         <div class="col-lg-10 offset-lg-1">
               <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="{{ asset('/Evento/event/') }}/<?= $data['last']; ?>" style="margin:10px;">
            <i class="fa fa-arrow-alt-circle-left fa-2x"></i>
          </a>
          <h3 class="font-w400" style="text-align:center;"><?= $mespanish; ?> <?= $data['year']; ?></h3>
          <a  href="{{ asset('/Evento/event/') }}/<?= $data['next']; ?>" style="margin:10px;">
            <i class="fa fa-arrow-alt-circle-right fa-2x"></i>
          </a>
        </div>

      </div>
         
      <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miercoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sabado</div>
        <div class="col header-col">Domingo</div>
      </div>
      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)

          @if  ($dayweek['mes']==$mes)
            <div class="col box-day">
              {{ $dayweek['dia']  }}
              <!-- evento -->
              @foreach  ($dayweek['evento'] as $event) 
                  <a class="badge badge-primary" href="{{ asset('/Evento/details/') }}/{{ $event->id }}">
                    {{ $event->nombre }}
                  </a>
              @endforeach
            </div>
          @else
          <div class="col box-dayoff">
          </div>
          @endif


          @endforeach
        </div>
      @endforeach
         </div>
          
      </div>

@endsection