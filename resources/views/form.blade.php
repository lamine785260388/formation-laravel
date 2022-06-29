@extends('layouts.app')
@section('content')

<h1 >créer un nouveau post</h1>
@if($errors->any())
@foreach($errors->all() as $error)
<div class="text-red-500 " >{{ $error }}</div>
@endforeach
@endif
<form  method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >
   @csrf
    <input type="text" name="title" class="border-gray-600 border-2  " ><hr>
  
    <textarea name="content" cols="30" rows="10" class="border-gray-600 border-2  my-2"></textarea><hr>
    <label for="avatar">choisi un photo</label><hr>
    <input type="file" class="block my-2" id="avatar" name="avatar" accept="image/png, image/jpeg"><hr>
    <button type="submit" class="bg-green-500 ">créer</button>

</form>
@endsection 

