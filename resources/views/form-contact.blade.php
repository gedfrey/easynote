@extends('layouts.container')
@section('body')

    <div class="container mt-5 mb-5">
        <form action="{{route('submit-contact')}}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-10">
                    <label for="inputSubject">Asunto </label>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <input name="subject" class="w-100" id="subject" type="text" class="@error('subject') is-invalid @enderror">
                </div>
                @error('subject')
                <div class="col-10">
                    <div class="alert alert-danger">Debes ingresa el asunto</div>
                </div>
                @enderror
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <label for="inputSubject">Email </label>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-10">
                    <input name="email" class="w-100" id="email" type="text">
                </div>
                @error('email')
                <div class="col-10">
                    <div class="alert alert-danger">Debes ingresar el email con formato correcto</div>
                </div>
                @enderror
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-10">
                    <textarea name="body" class="form-control" name="" id="body" class="w-100" rows="10"></textarea>
                </div>
                @error('body')
                <div class="col-10">
                    <div class="alert alert-danger">Debes ingresar el mensaje y debe ser superior a 10 caracteres</div>
                </div>
                @enderror
            </div>
            <div class="row justify-content-center">
                <div class="col-10 d-flex justify-content-around">
                    <a href="{{route('welcome')}}">
                        <button type="button" class="btn btn-secondary">Volver</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>


    </div>


@endsection
