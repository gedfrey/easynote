@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1 class="display-4 text-center mt-4">Agregado con exito</h1>
    <div class="d-flex justify-content-center mt-5">
        <button class="btn btn-secondary mr-2">ir al post</button>
        <button class="btn btn-secondary ml-2">Seguir</button>
    </div>
</div>


{{--<div class="container mt-4">--}}
{{--    <h1 class="display-4 text-center mt-4">Mensaje enviado con exito</h1>--}}
{{--    <div class="d-flex justify-content-center mt-5">--}}
{{--        <a href="{{route('welcome')}}">--}}
{{--            <button type="button" class="btn btn-secondary">Regresar</button>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}

@endsection
