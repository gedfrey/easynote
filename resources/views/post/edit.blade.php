@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <form action="{{route('posts.update',$post->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                    <textarea name="description" id="description" class="form-control mt-2" cols="30" rows="10">{{$post->description}}</textarea>
                    <button type="submit" class="btn btn-warning mt-2">Editar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
