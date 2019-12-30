@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detalle del Post
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Modificar</a>
                    <form action="{{route('posts.destroy',$post->id)}}" class="d-inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>


            <div class="card mt-2">
                <div class="card-header">
                    Contenido del Post
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{route('post.contents.edit',$post->id)}}" class="btn btn-warning">Modificar</a>
                </div>
            </div>
        </div>
    </div>




@endsection
