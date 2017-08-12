<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">My<i class="fa fa-book" aria-hidden="true"></i>Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('home') }}" data-toggle="tooltip" title="Home"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
                </li>
                @foreach($categories as $category)
                <li>
                    <a href="{{ route('category', ['cat' => $category->name]) }}">{{ $category->name }}</a>
                </li>
                @endforeach
                <li>
                    <a href="{{ route('contact') }}">Contact</a>
                </li>
                @if (Route::has('login'))
                    @if (Auth::check())
                            <li>
                                <a href="{{ route('admin') }}" data-toggle="tooltip" title="Admin Area">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li>
                                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    @else
                            <li>
                                <a href="{{ route('login') }}" data-toggle="tooltip" title="Login / Register">Login</a>
                            </li>
                    @endif
                    </div>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header"
        @if(Request::is('contact'))
            style="background-image: url('{{ asset('img/contact-bg.jpg') }}')">
        @else
            style="background-image: url('{{ asset('img/home-bg.jpg') }}')">
        @endif

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><span class="blue-letters">M</span>y<span class="blue-letters">B</span>log</h1>
                    <hr class="small">
                    <span class="subheading"><i>MyBlog is the example of web app suitable for manage all kinds of blogs.</i></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; MyBlog 2017</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Contact Form JavaScript -->
<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('js/contact_me.js') }}"></script>

<!-- Theme JavaScript -->
<script src="{{ asset('js/clean-blog.min.js') }}"></script>

</body>

</html>


{{--

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyBlog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/justified-nav.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h2 class="mainlogo">MyBlog example app</h2>
          @if (Route::has('login'))
                <div class="text-right">
                    @if (Auth::check())
                        <p>
                            <a class="btn btn-sm btn-success" href="{{ route('admin') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <p><a class="btn btn-sm btn-warning" href="{{ url('/login') }}">Sign in</a></p>
                    @endif
                </div>
            @endif
        <nav>
          <ul class="nav nav-justified">
            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
            <li class="{{ Request::is('posts/PHP') ? 'active' : '' }}"><a href="{{ route('category', ['cat' => 'PHP']) }}">PHP</a></li>
            <li class="{{ Request::is('posts/Laravel') ? 'active' : '' }}"><a href="{{ route('category', ['cat' => 'Laravel']) }}">Laravel</a></li>
            <li class="{{ Request::is('posts/Zend') ? 'active' : '' }}"><a href="{{ route('category', ['cat' => 'Zend']) }}">Zend</a></li>
            <li class="{{ Request::is('posts/Angular') ? 'active' : '' }}"><a href="{{ route('category', ['cat' => 'Angular']) }}">Angular</a></li>
            <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </nav>
      </div>

      <div class="jumbotron jumbo-image">
        <h1>Welcome to MyBlog!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
        <p><a class="btn btn-lg btn-warning" href="{{ route('category', ['cat' => 'All']) }}" role="button">View all posts</a></p>
      </div>

      @yield('content')

      <!-- Site footer -->
      <footer class="footer text-center">
          <p>MyBlog &copy; 2017</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>

--}}