@extends('layouts.app')

@section('content')

    <div class="container-fluid" id="app">
        <post-edit :post_id="{{json_encode($id)}}"  :post_update="{{json_encode(true)}}" v-bind:url_path="{{json_encode(asset('/storage'))}}"></post-edit>
    </div>

@endsection
