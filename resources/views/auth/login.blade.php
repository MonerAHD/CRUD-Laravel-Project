@extends('layout.app')

@section('title', 'Login | Page')

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
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" id="btn" class="btn btn-outline-primary">Login</button>
        </form>
    </div>


@endsection
