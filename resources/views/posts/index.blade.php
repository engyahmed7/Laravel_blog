@extends('layouts.main')

@section("title","posts")
@section("navbar")

@section("content")
<div class="table-responsive">
    <table
        class="table table-light">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Enable</th>
                <th scope="col">Published At</th>
                <th scope="col">User Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
            <tr>
                <td scope="col">{{ $post->id }}</td>
                <td scope="col">{{ $post->title }}</td>
                <td scope="col">{{ $post->body }}</td>
                <td scope="col">{{ $post->enable }}</td>
                <td scope="col">{{ $post->published_at }}</td>
                <td scope="col">{{ $post->user->name }}</td>
                <td scope="col">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary mb-3">Show</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary mb-3">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
  </div>
@endsection
