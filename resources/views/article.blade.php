@extends('layouts.app')
@section('content')

<h1>{{ $post->content }}</h1>
{{-- <span>{{ $post->image ? $post->image->path:'pas d_image'  }}</span> --}}
<hr>
<div><img src="{{ asset('storage/').'/'.$post->image->path }}" alt="image non dispo"/></div>
<h1>liste des video</h1>
@forelse($post->comments as $comment)
<span> {{ $comment->content }}| créer le {{ $comment->created_at->format('d-m-y') }}</span>
@empty
<span>Pas de commentaire</span>
@endforelse<hr>
@forelse($post->tags as $tags)
<span> {{ $tags->name }}| créer le {{ $tags->created_at->format('d-m-y') }}</span>
@empty
<span>Pas de tags</span>
@endforelse
<span>Nom de l'artiste de l'image:{{ $post->imageArtist?$post->imageArtist->name:' pas d_artiste' }}
    <span>commentaire le plus récent: {{ $post->latestcomment?$post->latestcomment->content:' pas de recent comment' }} </span><hr>
    <span>commentaire le plus ancien: {{ $post->latestcomment?$post->latestcomment->content:' pas de recent comment' }} </span>
@endsection 

   