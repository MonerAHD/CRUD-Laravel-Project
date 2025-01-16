@extends('layout.app')

@section('title', 'Show | Page')

@section('content')

    <div class="wrraper mx-4">
        <h1 class="text-center text-danger border border-dark py-2">Hello From Show Page</h1>

        <div class="card mb-3 border border-dark pb-3" style="width: 450px; height: fit-content; border-radius:20px">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body" style="width: 450px">
                        <img src="{{ asset('storage/' . $post->image ) }}" alt="image" style="width: 450px; height: 250px; border-top-left-radius:20px; border-top-right-radius:20px;  margin-left: -1rem; margin-top: -1rem; margin-bottom: 1rem">

                        <h4 class="card-title">Category : <p class="h5 d-inline fw-normal">{{ $post->category }}</p></h4><br>

                        <h4 class="card-title">Post title : <p class="card-text h5 fw-normal d-inline">{{ $post->title }}</p></h4><br>
                        
                        <h4 class="card-title">Post Description : <p class="card-text h5 fw-normal mt-2">{{ $post->description }}</p></h4>
                        
                        <p class="card-text mt-3"><small class="text-body-secondary">{{ $post->created_at }}</small></p>
                        
                        <div class="tegs mt-3">
                            @foreach ($post->tags as $tag)
                            
                            <a href="#" style="text-decoration: none">#{{ $tag->name }}</a>
                            
                            @endforeach
                        </div>

                    </div>
                    <a href="{{ route('posts.index') }}" id="btn" class="btn btn-outline-danger" style="margin-left: 10px">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
