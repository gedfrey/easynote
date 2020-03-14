@extends('layouts.app')
@section('content')

    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Estado</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr >
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if(!is_null($user->approved_at))
                        <td>Activo</td>
                    @else
                        <td>Inactivo</td>
                    @endif
                    <td>
                        <a href="{{route('admin.users.approve',$user->id)}}">
                            <button type="button" class="btn btn-primary">A</button>
                        </a>
                        <a href="{{route('admin.users.dissapprove',$user->id)}}">
                            <button type="button" class="btn btn-danger">D</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
