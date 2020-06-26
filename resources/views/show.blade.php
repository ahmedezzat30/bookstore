@extends('layouts/book_layout')

@section('content')
{{-- @if(Auth::user()->is_admin==1) --}}
<a href='{{ url('books/edit',$book->id) }}'>edit</a>
<a href='{{ url('books/delete',$book->id) }}'>delete</a>
{{-- @endif --}}
<h1>{{ $book->name }}</h1>
<h5>{{ $book->desc }}</h5> 

{{-- upload imageeeeeeeeee --}}
<img class="img img-fluid" src="{{ asset($book->image) }}" 
@endsection
