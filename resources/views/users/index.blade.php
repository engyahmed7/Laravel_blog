@extends('layouts.main')

@section("title", "Users List")

@section('content')
    <h2 class="mb-4">Users List</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
        @foreach($users as $user)
        <div class="col">
            <div class="card h-100 shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">{{ $user['name'] }}</h5>
                    <p class="card-text">{{ $user['email'] }}</p>
                    <p class="card-text text-primary">Posts Count: {{ $user['posts_count'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        {{ $users->links() }}
@endsection
