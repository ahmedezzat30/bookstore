@extends('layouts/book_layout')


@section('content')
    
@foreach($books as $book)
<a href="books/{{ $book->id }}"><h1>{{ $book->name }}</h1></a>

<h5>{{ $book->desc }}</h5>
<hr/>
@endforeach

@endsection