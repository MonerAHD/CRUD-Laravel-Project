@extends('layout.after_login')

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
            <a href="{{ route('posts.create') }}" class="btn btn-primary fs-5 me-2">Create a New Post</a>
            @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="{{ route('admin.index') }}" class="btn btn-outline-warning fs-5">Dashboard</a>
            @endif
        </div>
        @forelse ($posts as $post)
            <div class="card mt-3" style="width: 21.3rem; height: fit-content;">
                <img src="{{ asset('storage/' . $post->image ) }}" alt="image" style="width:21.3rem; height: 200px;">

                <div class="card-body">
                    
                        @foreach ($post->tags as $tag)
                            
                            <span class="badge bg-secondary">{{ $tag->name }}</span>

                        @endforeach                        

                    
                    <p class="card-text fw-bold h5 my-3">{{ $post->title }}</p>

                    <img src="{{asset('storage/' . $post->user->user_image)}}" alt="user_image" style="width: 50px; height: 50px; border-radius: 50%;">
                    <p class="d-inline ms-2" style="font-size: 18px">{{ $post->user->name }}</p>

                    <a href=" {{ route('posts.show' , $post->id) }} " class="d-block mt-2">Read More >></a><br>

                    <hr>

                    <div class="buttons">

                        @if(Auth::check())
                                @if(Auth::user()->id === $post->user_id)
                                <a href=" {{ route('posts.edit' , $post->id) }} " class="btn btn-outline-primary">Edit</a>
                                @endif

                            <a href=" {{ route('posts.comments' , $post->id) }} " class="btn btn-outline-success">Comments</a>
                            
                                @if(Auth::user()->id === $post->user_id)
                                    <form action="{{ route('posts.destroy' , $post->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                @endif 
                        @endif           
                        
                    </div>
                </div>
            </div>

        @empty
            <h2 class="alert alert-danger mt-3 text-center">There is No Data To Show</h2>
        @endforelse
        
    </div>

@endsection
