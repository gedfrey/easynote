@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <content-edit :post_id="{{json_encode($id)}}"></content-edit>
    </div>

@endsection
