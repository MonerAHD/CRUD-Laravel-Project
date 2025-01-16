@extends('layout.app')

@section('title', 'Register | Page')

@section('content')

@if (session('logout'))
<div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
    {{session('logout')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="wrraper mx-5 mt-5">
        @if ($errors->any())
            <div class="alert alert-danger text-center mt-3 fs-5">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            <h2 class="text-center mb-2">Register Form</h2>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="confirmation_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmation_password" id="confirmation_password">
            </div>
            <div class="mb-3">
                <a href="{{ route('login') }}" class="text-dark" style="text-decoration: none">You already have an account <span class="text-primary fw-bold ms-2">Login</span></a>
            </div>
            <button type="submit" id="btn" class="btn btn-outline-primary">Register</button>
        </form>
    </div>

@endsection