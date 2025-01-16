@extends('layout.app')

@section('title', 'Show | Page')

@section('content')

<div class="container d-flex justify-content-center" style="margin-top: 2rem;">  
    <div class="wrraper mx-4">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card mb-3 pb-3" style="width: 450px; height: fit-content; border-radius:20px">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body" style="width: 450px;">
                        <h2 class="h2 text-center">All Comments</h2><hr>
                        @foreach ($post->comments as $comment)
                        <div class="comments border py-2 px-1 mb-2" style="border-radius:10px; background-color:rgba(128, 128, 128, 0.256)">
                            <div class="user-info border-bottom border-dark pb-2">
                                <img src="{{ asset('storage/' . $comment->user->user_image)}}" alt="user_image" style="width: 40px; height: 40px; border-radius: 50%;"><p class="d-inline ms-2">{{ $comment->user->name }}</p><br>
                            </div>    
                            <div class="comment-content mt-2 py-2 px-2 d-flex justify-content-between">
                                <div class="content">
                                    {{ $comment->content }}
                                </div>
                                <div class="icons d-flex" style="gap: 10px">
                                    @if(Auth::check())
                                        @if(Auth::user()->id === $comment->user_id)
                                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="" onclick="return confirm('Are you sure you want to delete this comment?');" style="border: none; background:none; margin-top:-1.6rem"><i class="bi bi-archive-fill text-danger" style="cursor: pointer;"></i></button>
                                            </form>
                                            
                                            <a href="{{ route('comment.edit', $comment->id) }}" class=""><i class="bi bi-pencil-fill"></i></a>
                                        @endif
                                    @endif       
                                </div>
                            </div>

                        </div>
                        @endforeach

                        <div class="add-comment mt-3">

                            <div class="mb-1 mt-4">
                                <form action="{{ route('comments.store') }}" method="POST">

                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="text" name="content" class="form-control" id="content" placeholder="Add Your Comment">
                                    <button type="submit" class="btn btn-outline-primary mt-2">Add</button>
                                    <a href="{{ route('posts.index') }}" class="btn btn-outline-danger mt-2">Back</a>
                                    
                                </form>  
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection