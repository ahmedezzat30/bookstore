@extends('layouts/book_layout')

@section('content')


@if($errors->any())
@foreach ($errors->all() as $error)
    {{ $error }}
@endforeach

@endif
<form method="post" action="{{ url('/books/update',$book->id) }}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">book name</label>
      <input value="{{ $book->name }}"  type="text" name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">desc</label>
      <input value="{{ $book->desc }}" type="text" name='desc' class="form-control" id="exampleInputPassword1">
    </div>
  
    <button type="submit" class="btn btn-primary">update</button>
  </form>  
@endsection