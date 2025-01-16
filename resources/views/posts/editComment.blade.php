@extends('layout.app')

@section('title', 'Show | Page')

@section('content')



<div class="container">
    <div class="comments border py-2 px-1 mb-2" style="border-radius:10px; background-color:rgba(128, 128, 128, 0.256)">
        <div class="user-info border-bottom border-dark pb-2">
            <img src="{{ asset('storage/' . $comment->user->user_image) }}" alt="user_image"
                style="width: 40px; height: 40px; border-radius: 50%;">
            <p class="d-inline ms-2">{{ $comment->user->name }}</p><br>
        </div>
        <div class="comment-content mt-2 py-2 px-2">
            {{ $comment->content }}
            <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="content" class="form-control" id="content" value="{{ $comment->content }}">
                <button type="submit" class="btn btn-outline-primary mt-2">Edit</button>
                <a href="{{ url('/posts/comments') }}"><button class="btn btn-outline-danger mt-2">Back</button></a>
            </form>
        </div>

    </div>
</div>


@endsection
