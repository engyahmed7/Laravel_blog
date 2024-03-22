@extends('layouts.main')

@section("title", "Show Post")

@section("content")
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h2 class="fw-bold mb-0">Post Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p class="fw-bold">ID:</p>
                        <p>{{ $post->id }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">Title:</p>
                        <p>{{ $post->title }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">Body:</p>
                        <p>{{ $post->body }}</p>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">Enabled:</p>
                        <p>{{ $post->enable ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
