@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($posts as $post)
            <div class="container mb-2">
                <div class="card">
                    <div class="card-header">

                        {{$post->title}}

                    </div>

                    <div class="card-body">
                        <p class="card-text">{{$post->description}}</p>

                        @if($edit)
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">editar post</a>
                        @else
                        <a href="{{route('post.view',$post->id)}}" class="btn btn-primary">ir al post</a>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
