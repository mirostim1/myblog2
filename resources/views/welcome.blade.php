@extends('layouts.app2')

@section('content')
    <h1><i>LATEST POSTS ON My<i class="fa fa-book" aria-hidden="true"></i>Blog</i></h1>
    <hr>

    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @foreach($posts as $post)
        <div class="post-preview">
            <a href="{{ route('post', $post->slug) }}">
                <h2 class="post-title">
                    {{ $post->title }}
                </h2>
                <h3 class="post-subtitle">
                    {{ str_limit($post->body, 175) }}
                </h3>
            </a>
            <p class="post-meta">Posted by <strong>{{ $post->user->name }}</strong> - {{ $post->created_at->diffForHumans() }}</p>
        </div>
        <hr>
        @endforeach

        <!-- Pager -->
        <ul class="pager">
            <li class="next">
                <a href="{{ route('category', ['cat' => 'All']) }}">See All Posts &rarr;</a>
            </li>
        </ul>
    </div>
@stop

