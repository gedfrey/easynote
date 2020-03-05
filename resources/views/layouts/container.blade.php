<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daniel Alvarez Leal</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body id="app" class="d-flex flex-column">
{{--<div id="app" class="d-flex flex-column">--}}
    <header class="container-fluid bg-dark">
        <div class="container bg-dark">
            <div class="row">
                <h1 class="display-5 text-light text-sm-center text-md-left col">Hola, Soy Daniel Alvarez Leal</h1>
            </div>
            <div class="row justify-content-end">
                <nav class="navbar-dark navbar-expand-lg navbar-light bg-dark col-md-auto">
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
    </header>

    {{--body--}}

    @section('body')


    @show


    {{--    footer--}}

    <footer class="container-fluid bg-dark mt-auto p-2 bd-highlight">
        <div class="container bg-dark footer">
            <div class="row">
                <div class="container col">
                    <h1 class="text-white">Contactame:</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="container col-md-auto">
{{--                    <button class="btn" type="button" data-toggle="modal" data-target="#exampleModal">--}}
{{--                        <img src="{{asset('storage/icons/email-50.png')}}" alt="email">--}}
{{--                    </button>--}}

{{--                                    modal--}}

{{--                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                        <div class="modal-dialog" role="document">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                    <h5 class="modal-title" id="exampleModalLabel">Formulario de Correo</h5>--}}


{{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                        <span aria-hidden="true">&times;</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body">--}}
{{--                                    <form class="container" action="{{route('submit-contact')}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <div class="row justify-content-center">--}}
{{--                                            <div class="col-10">--}}
{{--                                                <label for="inputSubject">Asunto </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row justify-content-center">--}}
{{--                                            <div class="col-10">--}}
{{--                                                <input class="w-100" id="subject" type="text" class="@error('subject') is-invalid @enderror">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row justify-content-center">--}}
{{--                                            <div class="col-10">--}}
{{--                                                <label for="inputSubject">Email </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row justify-content-center mb-2">--}}
{{--                                            <div class="col-10">--}}
{{--                                                <input class="w-100" id="email" type="text">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row justify-content-center">--}}
{{--                                            <div class="col-10">--}}
{{--                                                <textarea class="form-control" name="" id="" class="w-100" rows="10"></textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>--}}
{{--                                            <button type="submit" class="btn btn-primary">Enviar</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    <!--end-modal-->
                    <button class="btn" type="button">
                        <a href="{{route('form-contact')}}">
                            <img src="{{asset('storage/icons/email-50.png')}}" alt="email">
                        </a>
                    </button>
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
{{--</div>--}}

</body>
</html>
