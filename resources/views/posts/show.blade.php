@extends('layout.app')

@section('title', 'Show | Page')

@section('content')

    <div class="wrraper mx-4">
        <h1 class="text-center text-danger border border-dark py-2">Hello From Show Page</h1>

        <div class="card mb-3" style="width: 100%; height: 350px">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/images/' . $post->image) }}" class="img-fluid rounded-start" style="height: 350px; width: 350px;" alt="Photo">
                </div>
                <div class="col-md-8 mt-5" style="margin-left: -40px">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">{{ $post->title }}</p>
                        <h4 class="card-title">Card Description</h4>
                        <p>{{ $post->description }}</p>
                        <p class="card-text"><small class="text-body-secondary">{{ $post->created_at }}</small></p>
                    </div>
                    <a href="{{ route('posts.index') }}" id="btn" class="btn btn-outline-danger w-25" style="margin-top: -5px; margin-left: 10px">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
