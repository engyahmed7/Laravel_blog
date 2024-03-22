@extends('layouts.main')

@section("title", "Edit Post")

@section("content")
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Edit Post</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" class="form-control" rows="5">{{ $post->body }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="toggle-switch">
                        <input type="hidden" name="enable" value="0">
                        <input type="checkbox" name="enable" {{ $post->enable ? 'checked' : '' }} value="1">
                        <label for="enabled">Enabled</label>
                    </label>
                </div>

                <div class="text-end">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
