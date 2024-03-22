@extends('layouts.main')
@section("title","create posts")
@section("navbar")

@section("content")

<h1 class="display-4">create posts</h1>

{{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li> {{$err}} </li>
            @endforeach
        </ul>
    </div>

@endif --}}

<form  action="{{route('posts.store')}}" method="post" class="d-block m-auto" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <div class="mb-3">
        <label  class="form-label">title</label>
        <input type="text" name="title" value="{{old('title')}}" class="form-control" style="width:600px;">
        @error("title")
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label  class="form-label">body</label>
        <input type="text" class="form-control" name="body" value="{{old('body')}}" style="width:600px;" >
        @error("body")
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="enableCheckbox" name="enable" value="1" {{ old('enable') ? 'checked' : '' }}>
            <label class="form-check-label" for="enableCheckbox">Enable</label>
        </div>
        @error("enable")
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


      <div class="mb-3">
          <label  class="form-label">date</label>
          <input type="date" class="form-control" name="published_at" value="{{old('published_at')}}" style="width:600px;" >
          @error("published_at")
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label  class="form-label">Image</label>
          <input @class(['form-control' ,'is-invalid'=>$errors->has('image')]) type="file" class="form-control" name="image" style="width:600px;" >
          @error("image")
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>

      <button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>
@endsection


