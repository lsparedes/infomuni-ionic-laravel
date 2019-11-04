@extends('layouts.simple')

@section('content')

<div class="bg-image" style="background-image: url('media/photos/photo13.jpg');">
    <div class="row no-gutters" style="background-color:rgba(240, 48, 5, 0.74);">

        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
            <div class="p-3 w-100">
            
                <div class="mb-3 text-center">
                    <a class="link-fx font-w700 font-size-h1" href="#">
                        <img src="{{asset('img/infomuni.png')}}" width="30%">
                    </a>
<!--                    <p class="text-uppercase font-w700 font-size-sm text-muted"> Inicio de Sesión</p>-->
                </div>
                

                <div class="row no-gutters justify-content-center">
                    <div class="col-sm-8 col-xl-6">
                        <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="py-3">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-lg form-control-alt {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="Usuario" required >
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-lg form-control-alt {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-hero-lg" style="background-color:#f03005;color:white">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Ingresar
                                </button>
                                <!--<p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('password.request') }}">
                                        <i class="fa fa-exclamation-triangle text-muted mr-1"></i> ¿Olvidaste tu contraseña?
                                    </a>
                                @endif
                                    
                                </p>-->
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <!-- Info  -->
        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
            <div class="p-3">
                <h1 class="font-w700 text-white mb-3">
                    <!-- Ilustre Municipalidad de Hualpén -->
<!--                    Sistema de administración-->
                </h1>
                <h5 class="font-w700 text-white-75 mb-0">
                    <!-- Copyright &copy; DRUP & IPTI. All Rights Reserved <span class="js-year-copy">2019</span> -->
                </h5>
            </div>
        </div>
    </div>
</div>


@endsection
