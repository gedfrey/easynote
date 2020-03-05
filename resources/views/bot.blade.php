@extends('layouts.container')

@section('body')

    <div class="container mt-4">
        <h1 class="display-4 text-center mt-4">Has sido detectado como un bot</h1>
        <div class="d-flex justify-content-center mt-5">
            <a href="{{route('welcome')}}">
                <button type="button" class="btn btn-secondary">Regresar</button>
            </a>
        </div>
    </div>

@endsection
