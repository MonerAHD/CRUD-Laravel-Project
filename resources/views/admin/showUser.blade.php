@extends('layout.app')

@section('title', 'All | Users')

@section('content')

<div class="wrraper mx-4">

    <div class="card mt-3" style="width: 20rem; height: 22rem">

        <div class="card-body">
            
            <img src="{{ asset('storage/' . $user->user_image) }}" alt="profile_image" style="width: 70px; height: 70px; border-radius: 50%;">
            
            <p class="d-inline ms-2">{{ $user->name }}</p><br>

            <p class="mt-3"><strong>User Email : </strong>{{ $user->email }}</p>

            <p><strong>User Role : </strong>{{ $user->role }}</p><br>

            <small>{{ $user->created_at }}</small><hr>

            <a href="{{ route('admin.allUsers') }}"><button class="btn btn-outline-danger mt-4" id="btn">Back</button></a>

        </div>
    </div>

</div>

@endsection