<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{url('../assets/css/media.css')}}" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('../../vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('../assets/css/media.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{url('../../vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{url('../../vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('../../css/creative.min.css')}}" rel="stylesheet">

    <style>
        .carousel-inner > .item > img
        {
            width:100%; height:570px;
        }
        body
        {
            background-image: radial-gradient( circle at top left, #00b0a7, #f06eaf);
        }

    </style>

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{url('/music')}}">YBeats</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#artists">Artistes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#musics">Dernières sorties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#forum">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    @if(App::environment() =='local')
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">S'inscrire</a></li>
                    @endif
                @else
                    <li class="nav-item"><a class="nav-link" href="{{url('/cart')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a></li>
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="bordered inverted teal user icon"></i>{{ Auth::user()->name }} <span class="caret"> </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="nav-item"><a class="nav-link" href="{{url('/user/'.Auth::user()->id.'/edit')}}"><span class="	glyphicon glyphicon-user"></span> Mon profil </a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/user/create')}}"><span class="glyphicon glyphicon-upload"></span> Ajout de musique</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/orders')}}"><span class="glyphicon glyphicon-download"></span> Mes commandes</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>
                                    Déconnexion
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
@yield('content')


<!-- Bootstrap core JavaScript -->
<script src="{{url('../../vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('../../vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{url('../../vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('../../vendor/scrollreveal/scrollreveal.min.js')}}"></script>
<script src="{{url('../../vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{url('../js/creative.min.js')}}"></script>

</body>

</html>
