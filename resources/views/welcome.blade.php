<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Daniel Alvarez Leal</title>

        <!-- Fonts -->
{{--        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

        <!-- Styles -->

        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <style>
        </style>

    </head>
    <body>
{{--        header--}}
<div class="container-fluid bg-dark">
    <div class="container bg-dark">
        <div class="row">
            <h1 class="display-5 text-light text-sm-center text-md-left col">Hola, Soy Daniel Alvarez Leal</h1>
        </div>
        <div class="row justify-content-end">
            <nav class="navbar-dark navbar-expand-lg navbar-light bg-dark col-md-auto">
                {{--                    <a class="navbar-brand text-light" href="#">Home</a>--}}
                <button class="navbar-toggler text-success" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon blue" style="color:blue"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link text-light text-center text-sm-center text-md-left"  href="#Experiencia">Experiencia<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light text-center text-sm-center text-md-left" href="#Estudios">Estudios</a>
                        </li>
                        <li class="nav-item text-light">
                            <a class="nav-link text-light text-center text-sm-center text-md-left" href="#Tecnologias">Tecnologias</a>
                        </li>
                        <div class="dropdown dropleft text-center text-sm-center text-md-left">
                            <button class="btn btn-dark dropdown-toggle text-light text-center text-sm-center text-md-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (Route::has('login'))
                                    @auth
                                        <a class="dropdown-item" href="#">ir al Blog</a>
                                    @else
                                        <a class="dropdown-item" href="#">Login</a>
                                        @if (Route::has('register'))
                                            <a class="dropdown-item" href="#">Registrar</a>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>

    </div>
</div>

{{--body--}}
    <div class="container-fluid" style="background-color: #f5f5f5">
        <div class="container bg-white mt mb-2">
            <p class="m-0 lead">Actualmente estoy cursando la carrera de Ingenieria de ejecución en informatica en la Universidad de Santiago de Chile, soy un entusiasta de la informática y principalmente de la programación, aunque recién estoy empezando en esto, para mi cada día es algo nuevo, un reto o simplemente otra manera de pensar las cosas.</p>
            <p class="lead m-0">En el 2012 empecé mis estudios en la carrera de Tecnólogo en Telecomunicaciones de la misma Universidad, donde conoci la programación luego de eso me decidi a ingresar en ese mundo, ingresando en el 2017 a la carrera de Informatica</p>
        </div>

        <div class="container mt-5 mb-5" id="Experiencia">
            <h1 class="display-5 mb-4 mt-4 mr-2 text-center border border-top-0 border-right-0 border-left-0 border-dark">Experiencia Laboral</h1>
        </div>

        <div class="container bg-white p-0">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-header">
                    <h1>Asesorías computacionales Proredes</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center mb-5">Soporte Nivel 2 en telefonía IP y Webhosting.</h5>
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{asset('storage/icons/point-30.png')}}" alt="point">
                        </div>
                        <div class="col-10">
                            <p class="lead">Generar reportes y/o tickets de incidentes de servicio telefonía IP y webhosting.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{asset('storage/icons/point-30.png')}}" alt="point">
                        </div>
                        <div class="col-10">
                            <p class="lead">Configurar/Administrar centrales telefónicas IP asterisk y servidores web como LAMP, LEMP, IIS o Django(nginx,gunicorn,postgresql)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{asset('storage/icons/point-30.png')}}" alt="point">
                        </div>
                        <div class="col-10">
                            <p class="lead">Configurar/administrar servicios en linux como dhcpd, tftpd, pure-tfpd y vsftpd.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{asset('storage/icons/point-30.png')}}" alt="point">
                        </div>
                        <div class="col-10">
                            <p class="lead">Configuración de red de servidores linux y servicio openvpn para conectar sucursales o clientes fuera de la red local.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <img src="{{asset('storage/icons/point-30.png')}}" alt="point">
                        </div>
                        <div class="col-10">
                            <p class="lead">Configuración de certificados SSL para paginas web en servidores linux y registros DNS.</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="http://www.proredes.net" class="btn btn-primary">ir al sitio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5" id="Estudios">
            <h1 class="display-5 mb-4 mt-4 mr-2 text-center border border-top-0 border-right-0 border-left-0 border-dark">Estudios</h1>
        </div>

                <div class="card-body row justify-content-center">
                    <div class="card col-12 col-md-4 mb-2 mb-md-0 mr-0 mr-md-3">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Tecnólogo en Telecomunicaciones</h5>
                            <p class="lead">Universidad de Santiago de Chile</p>
                            <p class="lead">Inicio: 2012</p>
                            <p class="lead">Termino: 2015</p>
                        </div>
                    </div>
                    <div class="card col-12 col-md-4 mb-2 mb-md-0">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">Ingenieria de ejecucíon informatica</h5>
                            <p class="lead">Universidad de Santiago de Chile</p>
                            <p class="lead">Inicio: 2017</p>
                            <p class="lead">Actualmente cursando el septimo semestre</p>
                        </div>
                    </div>
                </div>
   {{--         </div>
        </div>
--}}
        <div class="container mt-5 mb-5" id="Tecnologias">
            <h1 class="display-5 mb-4 mt-4 mr-2 text-center border border-top-0 border-right-0 border-left-0 border-dark">Tecnologias</h1>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-center mb-3">

                <div class="col-4 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top" src="{{asset('storage/img/html.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-4 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/css.jpeg')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/js.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row align-items-center justify-content-center mt-2 mb-3">

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top" src="{{asset('storage/img/c-language.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/java.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/php-programing.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/python-programing.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row align-items-center justify-content-center mt-2 mb-3">

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top" src="{{asset('storage/img/Laravel-logo.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/Vue-logo.svg')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/spring-boot.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 d-flex">
                    <div class="card flex-fill">
                        <img class="card-img-top img-fluid" src="{{asset('storage/img/django.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


    </div>
    </div>
{{--    footer--}}
<footer class="container-fluid bg-dark footer">
    <div class="container bg-dark footer">
        <div class="row">
            <div class="container col">
                <h1 class="text-white">Contactame:</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="container col-md-auto">
                <button class="btn" type="button" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{asset('storage/icons/email-50.png')}}" alt="email">
                </button>

                {{--                modal--}}

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!--end-modal-->

                <button class="btn" type="button">
                    <a href="https://wa.me/56951359547">
                        <img src="http://localhost:8000/storage/icons/whatsapp-white-50.png" alt="whatsapp">
                    </a>
                </button>
                <button class="btn" type="button">
                    <a href="https://cl.linkedin.com/in/daniel-alvarez-leal-260131b7">
                        <img src="http://localhost:8000/storage/icons/linkedin-white-50.png" alt="linkedin">
                    </a>
                </button>
                <button class="btn" type="button">
                    <a href="https://www.facebook.com/daniel.alvarezleal.3">
                        <img src="http://localhost:8000/storage/icons/facebook-white-50.png" alt="facebook">
                    </a>
                </button>
            </div>
        </div>

    </div>
</footer>

    </body>
</html>
