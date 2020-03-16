@extends('layouts.app')

@section('content')

    @error('title')

    <div class="alert alert-danger">
        El titulo no cumple con los requisitos minimos
    </div>

    @enderror


    @error('description')

    <div class="alert alert-danger">
        El Texto no cumple con el formato
    </div>

    @enderror

    <div class="container">
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <input type="text" name="title" id="title" class="form-control mt-2 @error('title') is-invalid @enderror " placeholder="Ingresa el titulo.." value="{{old('title')}}">
            <textarea name="description" id="description" class="form-control mt-2 @error('description') is-invalid @enderror " cols="30" rows="10" placeholder="Ingresa una descripción">{{old('description')}}</textarea>

            <button type="submit" class="btn btn-primary mt-2">Enviar</button>

        </form>
    </div>


@endsection
