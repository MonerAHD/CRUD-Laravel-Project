@extends('layout.app')

@section('title', 'profile Editing | Page')

@section('content')

<div class="conteiner">
    @if ($errors->any())
            <div class="alert alert-danger text-center mt-3 fs-5">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
    @endif

    <div class="wrraper mx-4">

        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="confirmation_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmation_password" id="confirmation_password" required>
            </div>
            <div class="mb-3">
                <label for="user_image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" name="user_image" id="user_image" value="{{ $user->user_image }}">
            </div>
            <button type="submit" id="btn" class="btn btn-outline-primary">Update</button>
            <a href="{{ route('user.profile') }}"><button class="btn btn-outline-danger" id="btn">Back</button></a>

        </form>



    </div>

</div>

@endsection