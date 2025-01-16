@extends('layout.app')

@section('title', 'All | Users')

@section('content')

<div class="wrraper mx-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('updated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('updated')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('deleted')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mt-3 d-flex justify-content-start">
        <a href="{{ route('admin.create') }}" class="btn btn-outline-primary fs-5">Create a New User</a>
        <a href="{{ route('admin.index') }}" class="btn btn-outline-warning fs-5 ms-2">Dashboard</a>
    </div>
    @foreach ($users as $user)
    <div class="card mt-3" style="width: 20rem; height: 10.3rem">
        <div class="card-body">

            <img src="{{ asset('storage/' . $user->user_image) }}" alt="profile_image" class="mb-2" style="width: 50px; height: 50px; border-radius: 50%;">
            <p class="text-warning d-inline ms-2">{{$user->name}}</p><br>

            
            <a href="{{ route('admin.show', $user->id) }}" class="">Read more >></a>
            <div class="change mt-3">

                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-outline-primary">Edit</a>
                <form action="{{ route('admin.destroy', $user->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection