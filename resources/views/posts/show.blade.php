@extends('layouts.main')

@section("title", "Show Post")

@section("content")
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h2 class="fw-bold mb-0">Post Details</h2>
                </div>
                <div class="card-body">
                    @isset($post->image )
                        <img src="{{ asset('storage/' . $post->image)}}" class="img-fluid" alt="Post Image">
                    @endisset
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $post->id }}</li>
                    <li class="list-group-item"><strong>Title:</strong> {{ $post->title }}</li>
                    <li class="list-group-item"><strong>Body:</strong> {{ $post->body }}</li>
                    <li class="list-group-item"><strong>Enable:</strong> {{ $post->enable ? 'Yes' : 'No' }}</li>
                </ul>
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


{{-- asset('storage/' . $post->image) --}}
