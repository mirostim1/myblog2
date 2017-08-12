@extends('layouts.post')

@section('content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{ asset('img/programmers.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>
                            <span class="blue-letters">{{substr($post->title, 0, 1)}}</span>{{substr($post->title, 1)}}
                        </h1>
                        <span class="meta category">
                            Article in category
                            <a class="cat-link" href="{{ url('/posts/'.$post->category->name) }}"><span class="blue-letters">{{ $post->category->name }}</span></a>
                        </span>
                        <span class="meta posted-by">
                            <i class="fa fa-pencil"></i>
                            Posted by <strong>{{ $post->user->name }}</strong>
                        </span>
                        <span class="meta calendar">
                            <i class="fa fa-calendar"></i> {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    @if(!$post->photo_id)
                        <img class="img-responsive" src="{{ asset('img/code.jpg') }}" alt="">
                    @else
                        <img class="img-responsive" src="{{ asset($post->photo->path) }}" alt="">
                    @endif

                    <br>
                    {{ $post->body }}

                </div>
            </div>
        </div>
    </article>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <hr>
                <h3>Comments on this article</h3>
                <hr>

                {{-- Disqus commentig system --}}
                <div id="disqus_thread"></div>

                <script>
                    var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };

                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://myblog-dev-1.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>

                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                <script id="dsq-count-scr" src="//myblog-dev-1.disqus.com/count.js" async></script>
                {{-- .End - Disqus commentig system --}}

            </div>
        </div>
    </div>

@stop
