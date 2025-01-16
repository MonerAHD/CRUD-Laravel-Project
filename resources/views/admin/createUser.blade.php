@extends('layout.app')

@section('title', 'Create | User')

@section('content')

{{-- @if (session('logout'))
<div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
    {{session('logout')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}

    <div class="wrraper mx-5 mt-5">
        @if ($errors->any())
            <div class="alert alert-danger text-center mt-3 fs-5">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            <h2 class="text-center mb-2">Creation Form</h2>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">UserName</label>
                <input type="name" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="confirmation_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmation_password" id="confirmation_password" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">User Type</label>
                <select class="form-select" aria-label="Default select example" id="role" name="role" required>
                    <option selected>Open this select menu</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="user_image" class="form-label">User Image</label>
                <input type="file" class="form-control" name="user_image" id="user_image" value="{{ old('user_image') }}">
            </div>
            <button type="submit" id="btn" class="btn btn-outline-primary">Create User</button>
            
        </form>
        <a href="{{ route('admin.allUsers') }}" class=""><button type="submit" id="btn" class="btn btn-outline-danger" style="margin-top: -4.8rem; margin-left: 9.8rem">Back</button></a>
        

    </div>

@endsection