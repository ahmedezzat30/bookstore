@extends('layouts/book_layout')

@section('content')

<h3>My Notes</h3>


<form method="post" action="{{ url('/users/comment') }}" >
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">user email</label>
      <input  type="text" name='conent' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>




    <button type="submit" class="btn btn-primary">add comment</button>
  </form>

    {{-- user comment  --}}
    @foreach(Auth::user()->comments as $comment)
     <div class="alert alert-success" >{{ $comment->conent }}</div>
     <a href='{{ url('users/delete',$comment->id) }}'>delete</a>

    @endforeach

    {{-- all comment of users  --}}

    {{-- @foreach($comments as $comment)
    <div class="alert alert-success" >{{ $comment->conent }}</div>
    <a href='{{ url('users/delete',$comment->id) }}'>delete</a>

   @endforeach --}}

@endsection


