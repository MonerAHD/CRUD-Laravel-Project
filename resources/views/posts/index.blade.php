@extends('layout.app')

@section('title', 'Home | Page')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('updated'))
        <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
            {{session('updated')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
            {{session('deleted')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="wrraper mx-4">
        <h1 class="text-center text-danger border border-dark py-2">Hello From Home Page</h1>
        <div class="mt-3 d-flex justify-content-start">
            <a href="{{ route('posts.create') }}" class="btn btn-primary fs-5">Create a New Card</a>
        </div>
        @forelse ($posts as $post)
            <div class="card mt-3" style="width: 21.3rem;">
                @if ($post->image)
                    @php 
                        $imageNameJSON = json_decode($post->image, true);
                    @endphp
                    @foreach ($imageNameJSON as $images)    
                    <img src="{{ asset('storage/' . $images) }}" class="card-img-top img-fluid" id="image" alt="Photo">
                    @endforeach
                @endif   
                <div class="card-body">
                    <h4>title</h4>
                    <p>{{ $post->title }}</p>
                    <h3 class="card-title">Card Description</h3>
                    <p class="card-text">{{ $post->description }}</p>
                    <hr>
                    <a href=" {{ route('posts.show' , $post->id) }} " class="btn btn-outline-primary">Show</a>
                    <a href=" {{ route('posts.edit' , $post->id) }} " class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('posts.destroy' , $post->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>

        @empty
            <h2 class="alert alert-danger mt-3 text-center">There is No Data To Show</h2>
        @endforelse
    </div>

@endsection
