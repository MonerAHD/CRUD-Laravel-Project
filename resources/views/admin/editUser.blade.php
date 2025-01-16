@extends('layout.app')

@section('title', 'Edit | User')

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
        <form action="{{ route('admin.update' , $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">New UserName</label>
                <input type="name" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="confirmatiom_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirmation_password" id="confirmation_password">
            </div>
            <div class="mb-4">
                <label for="role" class="form-label">User Type</label>
                <select class="form-select" aria-label="Default select example" id="role" name="role">
                    <option selected>Open this select menu</option>
                    <option value="user"{{" $user->role == 'user'?'selected': "}}>User</option>
                    <option value="admin"{{" $user->role == 'admin'?'selected': "}}>Admin</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="user_image" class="form-label">User Image</label>
                <input type="file" class="form-control" name="user_image" id="user_image">
            </div>

            <button type="submit" id="btn" class="btn btn-outline-primary">Edit</button>

            <a href="{{ route('admin.allUsers') }}"><button type="submit" id="btn" class="btn btn-outline-danger">Back</button></a>
        
        </form>

    
    </div>

@endsection