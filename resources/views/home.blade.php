@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="display-3 text-center">Bienvenido al Sistema Online</h1>

                <div id="carouselExampleFade" class="carousel slide carousel-fade mt-5" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/indexhome.png') }}" class="d-block w-100" alt="Farmacia Norte">
                        </div>
                        <div class="carousel-item">
                            <img src="https://intucuman.info/uploads/bancaria-farmacia-propia.jpg" class="d-block w-100"
                                alt="Medicamentos">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.tucumanalas7.com.ar/u/fotografias/m/2016/6/23/f800x450-52200_103646_5050.jpg"
                                class="d-block w-100" alt="Atencion">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
