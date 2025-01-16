@extends('layout.app')

@section('title', 'profile User | Page')

@section('content')


    <div class="container d-flex justify-content-center" style="flex-direction: column">
        <div class="messages">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('updated'))
                <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                    {{ session('updated') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>

        <div class="wrraper d-flex justify-content-center align-items-center" style="flex-direction: column">
            <img src="{{ asset('storage/' . $user->user_image) }}" alt="user_image" style="width: 50px; height: 50px; border-radius: 50%">
            <p class="d-inline mt-1">{{ $user->name }}</p>
            <p><strong>Your Email : </strong>{{ $user->email }}</p>
            <p><strong>Comment Count : </strong>{{ $commentCount }}</p>
            <p><strong>Posts Count : </strong>{{ $postCount }}</p>
        </div>

        <div class="buttons d-flex justify-content-center">
            <a href="{{ route('user.edit') }}"><button class="btn btn-outline-danger me-2">Edit</button></a>
            <a href="{{ route('posts.index') }}" class=""><button class="btn btn-outline-danger">Back</button></a>
        </div>


    </div>
@endsection

