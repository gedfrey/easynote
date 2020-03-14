@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1 class="display-4 text-center mt-4">Agregado con exito</h1>
    <div class="d-flex justify-content-center mt-5">
        <a href="{{route('post.view',$post_id)}}">
            <button class="btn btn-secondary mr-2">ir al post</button>
        </a>
        <a href="{{route('post.contents.edit',$post_id)}}">
            <button class="btn btn-secondary ml-2">Seguir</button>
        </a>
    </div>
</div>

@endsection
