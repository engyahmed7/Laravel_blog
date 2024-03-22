@extends('layouts.main')

@section("title", "Posts")

@section("content")

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card h-100 shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>ID:</strong> {{ $post->id }}</li>
                            <li class="list-group-item"><strong>Enable:</strong> {{ $post->enable ? 'Yes' : 'No' }}</li>
                            <li class="list-group-item"><strong>Date:</strong> {{ $post->published_at }}</li>
                            <li class="list-group-item"><strong>User:</strong> {{ $post->user->name }}</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">Show</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </div>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        {{ $posts->links() }}

@endsection
