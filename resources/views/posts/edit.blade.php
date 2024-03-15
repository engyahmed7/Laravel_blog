@extends('layouts.main')
@section("title","edit post")
@section("navbar")

@section("content")
<form method="POST" action="{{ route('posts.update',$post->id) }}" >
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">title</label>
        <input name="title" class="form-control" value="{{ $post->title }}" style="width:500px;"> </input>
      </div>
    <div class="mb-3">
      <label class="form-label" >body</label>
      <input name="body" class="form-control" value="{{ $post->body }}  " style="width:500px;" ></input>
    </div>


    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
@endsection
