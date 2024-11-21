@extends('layout.app')

@section('title', 'Show | Page')

@section('content')

    <div class="wrraper mx-4">
        <h1 class="text-center text-danger border border-dark py-2">Hello From Show Page</h1>
        <a href="{{ route('posts.index') }}" id="btn" class="btn btn-outline-danger">Back</a>
    </div>

@endsection