@extends('layout.app')

@section('title', 'Edit | Page')

@section('content')

    <div class="wrraper mx-4">
        <h1 class="text-center text-danger border border-dark py-2">Edit Page</h1>
        @if ($errors->any())
            <div class="alert alert-danger text-center mt-3 fs-5">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif
        <form action="{{ route('posts.update', ['post' => $post->id]) }}') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3 mt-4">
                <label for="title" class="form-label fs-4">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="New Title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fs-4">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"
                    placeholder="Write a New Description Here">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
                <img src="{{ asset('storage/images/' . $post->image) }}" alt="Photo" for="image" style="width: 300px; height: 250px">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label fs-4">Change Image</label>
                <input class="form-control" name="image[]" type="file" id="formFile" multiple>
            </div>
            <button type="submit" name="submit" id="btn" class="btn btn-outline-primary mt-2 fs-5">Update</button>
            <a href="{{ route('posts.index') }}" id="btn" class="btn btn-outline-danger mt-2 ms-2 fs-5">Back</a>
        </form>
    </div>

@endsection
