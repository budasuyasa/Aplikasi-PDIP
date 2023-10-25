@extends('layouts.main')
@section('container')

<h1 class="text-center mb-3">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif(request('user'))
                <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Blog" autocomplete="off" name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if($blog->count())
    

<div class="card mb-3">
    <img class="card-img-top" src="https://source.unsplash.com/1200x400?{{ $blog[0]->category->name }}" alt="Card image cap">
    <div class="card-body text-center">
        <h3 class="card-title"><a class="text-decoration-none" href="/post/{{ $blog[0]->slug }}">{{ $blog[0]->title }}</a></h3>
        <p>
            <small class="text-muted">
                <h5>By <a href="/blog?user={{ $blog[0]->user->username }}" class="text-decoration-none">{{ $blog[0]->user->name }}</a> In <a href="/blog?category={{ $blog[0]->category->slug }}">{{ $blog[0]->category->name }}</a> {{ $blog[0]->created_at->diffForHumans() }}</h5>
            </small>
        </p>
        <p class="card-text">{{ $blog[0]->excerpt }}</p>
        <a class="text-decoration-none  btn btn-primary" href="/post/{{ $blog[0]->slug }}">Read More</a>
    </div>
</div>
@else
<p class="text-center fs-4" >No Post Found!</p>
@endif


<div class="container">
    <div class="row">
        
        @foreach($blog as $post)
        
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="position-absolute px-3 py-2 bg-dark text-white">
                    <a class="text-decoration-none text-white" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                <img class="card-img-top" src="https://source.unsplash.com/500x500?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>
                        <small class="text-muted">
                            <h5>By <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }} </a> in <a href="/blog?category={{ $blog[0]->category->slug }}">{{ $blog[0]->category->name }}</a>{{ $post->created_at->diffForHumans() }}</h5>
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>


@endsection

