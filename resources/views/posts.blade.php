@extends('layouts.app2')

@section('content')

        @if($categ == 'ALL POSTS')
            <h1><i>ALL POSTS ON My<i class="fa fa-book" aria-hidden="true"></i>Blog</i></h1>
        @else
            <h1><i>{{ $categ }}</i></h1>
        @endif
    <hr>

    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @if(count($posts) > 0)
            @foreach($posts as $index => $post)
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
                {{-- @if($index < ($last - 1))
                    <hr>
                @endif --}}
            @endforeach
        @else
            <h3 align="center">Sorry there are no posts for display in this category.</h3>
        @endif

        <!-- Pagination -->
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{ $posts->render() }}
            </div>
        </div><!-- .Pagination -->
    </div>
@stop