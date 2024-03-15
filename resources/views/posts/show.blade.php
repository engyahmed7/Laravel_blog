@extends('layouts.main')
@section("title","Show Post")
@section("navbar")

@section("content")
        <div class="row">
            <div class="col-4 d-block m-auto">
                <div class="card ">
                        <div class="card-header fw-bold text-dark">
                        ID: {{ $post->id }}
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Title: {{ $post->title }}</h5>
                            <p class="card-text">Body: {{ $post->body }}</p>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
