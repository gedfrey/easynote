@extends('layouts.app')

@section('content')

    <div class="container-fluid" id="app">
        <content-edit :post_id="{{json_encode($id)}}"></content-edit>
    </div>

@endsection
