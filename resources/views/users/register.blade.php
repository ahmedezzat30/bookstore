@extends('layouts/book_layout')

@section('content')


@if($errors->any())
@foreach ($errors->all() as $error)
    {{ $error }}
@endforeach

@endif
<form method="post" action="{{ url('/users/register') }}" >
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">user email</label>
      <input value="{{ old('email') }}"  type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">password</label>
      <input  type="password" name='password' class="form-control" id="exampleInputPassword1">
    </div>
    
   
  
    <button type="submit" class="btn btn-primary">Register</button>
  </form>  
@endsection