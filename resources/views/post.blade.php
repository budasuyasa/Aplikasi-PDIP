@extends('layouts.main')

@section('container')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2>{{ $post->title }}</h2>
        <p>By <a href="/blog?user={{ $post->user->username }}">{{ $post->user->name }} </a>in <a href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        <img class="card-img-top" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
        <article class="my-3">
            {!! $post->body !!}
         </article>
        <a href="/blog">Back To Blog</a>
        </div>
    </div>
</div>



@endsection