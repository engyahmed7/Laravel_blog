@extends('layouts.main')
@section("title","users list")

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Posts Count</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
      <tr>
        <th scope="row">{{$user['id']}}</th>

        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['posts_count']}}</td>
      </tr>
     @endforeach
      </tr>
    </tbody>

  </table>
  {{ $users->links() }}

@endsection
