@extends('layouts.container')

@section('body')

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

@endsection
