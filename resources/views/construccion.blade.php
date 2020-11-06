<!DOCTYPE html>
<html lang="es" class="backgroundColor">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Grupo DHS</title>
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Lemon' rel='stylesheet' type='text/css'>
        
        <!-- <link rel="shortcut icon" href="/img/favicon.ico"> -->

        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('construccion/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('construccion/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('construccion/css/animate.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('construccion/css/YTPlayer.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('construccion/css/supersized.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('construccion/css/styles.css') }}" />

        
    </head>
    <body>

        <!-- CONTAINER -->
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                </div>
                <div class="col-md-1">
                    <a href="{{ route('login') }}" class="btn btn-transparent btn-facebook">Login</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section clearfix">
                        <h1 class="logo animated fadeInDown">Grupo DHS</h1>
                        
                        <div id="text_slider">
                            <div class="slide clearfix"><h2>Estamos trabajando en el sitio...</h2></div>

                            <div class="slide clearfix"><h2>Próximamente Tienda DHS!</h2></div>
                        </div>
                        
                    </div>

                    <!-- COUNTDOWN -->
                    <div class="section clearfix animated fadeIn" id="countdown">
                        <!-- Days -->
                        <div class="countdown_group">
                            <span class="countdown_value">{dnn}</span> 
                            <span class="countdown_help">{dl}</span>
                        </div>

                        <!-- Hours --> 
                        <div class="countdown_group">
                            <span class="countdown_value">{hnn}</span> 
                            <span class="countdown_help">{hl}</span>
                        </div> 

                        <!-- Minutes -->
                        <div class="countdown_group">
                            <span class="countdown_value">{mnn}</span> 
                            <span class="countdown_help">{ml}</span> 
                        </div>

                        <!-- Seconds -->
                        <div class="countdown_group">
                            <span class="countdown_value">{snn}</span> 
                            <span class="countdown_help">{sl}</span>
                        </div>
                    </div>
                    <!-- END COUNTDOWN -->

                    

                    <div class="section clearfix animated fadeIn" id="contact">
                        <a href="#"><i class="fa fa-envelope-o"></i> info@grupodhs.com.ar</a>
                        <a href="#"><i class="fa fa-phone"></i> 381 - 4361146 / 4364239</a>
                    </div>


                    <div class="section clearfix">
                        <a href="https://es-la.facebook.com/dhstienda/" class="btn btn-transparent btn-facebook"><i class="fa fa-facebook fa-fw"></i></a>
                        <a href="#" class="btn btn-transparent btn-instagram"><i class="fa fa-instagram fa-fw"></i></a>
                        <a href="mailto:info@grupodhs.com.ar" class="btn btn-transparent btn-googleplus"><i class="fa fa-envelope-o fa-fw"></i></a>
                    </div>

                    

                </div>
            </div>
        </div>
        <!-- END CONTAINER -->

        <!-- FOOTER -->
        <div id="footer">
                <p>Grupo DHS</p>
                <a href="{{route('eccomerce.home')}}" class="nav-link">               
                  <p>Eccomerce</p>
                </a>
               
        </div>
        <!-- END FOOTER -->
		
		<!-- JS -->
        <script src="{{ asset('construccion/js/jquery.min.js') }}"></script>
        <script src="{{ asset('construccion/js/jquery.plugin.js') }}"></script>
        <script src="{{ asset('construccion/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('construccion/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('construccion/js/supersized.min.js') }}"></script>
        <script src="{{ asset('construccion/js/jquery.cycle.min.js') }}"></script>
        <script src="{{ asset('construccion/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ asset('construccion/js/scripts.js') }}"></script>
        
    </body>
</html>