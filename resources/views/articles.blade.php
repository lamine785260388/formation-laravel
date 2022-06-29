@extends('layouts.app')
@section('content')
<h1>articles</h1>
 @if ($posts->count() > 0)
@foreach($posts as $post)
<h3><a href="{{ route('posts.show',['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
       
            @endforeach 
            @else
            <span> il n'y as pas encore d'enregistrement dans Post</span>
            @endif
            <hr>
            <h1>liste des video</h1>
            @forelse($video->comments as $comment)
<span> {{ $comment->content }}| créer le {{ $comment->created_at->format('d-m-y') }}</span>
@empty
<span>Pas de commentaire</span>

@endforelse<hr>
@endsection 