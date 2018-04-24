<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield ('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ '../favicon.ico' }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            min-height:200px;
            max-height: 300px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }


        #aPlayer > audio { width: 100% }
        /* Chrome 29+ */
        @media screen and (-webkit-min-device-pixel-ratio:0)
        and (min-resolution:.001dpcm) {
            /* HIDE DOWNLOAD AUDIO BUTTON */
            #aPlayer {
                overflow: hidden;width: 390px;
            }

            #aPlayer > audio { width: 420px; }
        }

        /* Chrome 22-28 */
        @media screen and(-webkit-min-device-pixel-ratio:0) {

            #aPlayer {
                overflow: hidden;width: 390px;
            }

            #aPlayer > audio { width: 420px; }
        }

    </style>
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="/images">

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/MusicApp/public/index.php/music">Accueil</a></li>
                <li><a href="/MusicApp/public/index.php/artists">Artistes</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><span class=glyphicon glyphicon-log-in"></span>Login</a></li>
                    @if(App::environment() =='local')
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
                @else
                    <li><a href="{{url('/cart')}}">My cart</a></li>
                    <li><a href="{{url('/user/'.Auth::user()->id.'/edit')}}">{{Auth::user()->name}}</a></li>

                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="../images/background1.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Quelques tests</h3>
                <p>Et encore</p>
            </div>
        </div>

        <div class="item">
            <img src="../images/background2.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Quelques tests</h3>
                <p>Et encore</p>
            </div>
        </div>

        <div class="item">
            <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image">
            <div class="carousel-caption">
                <h3>Quelques tests</h3>
                <p>Et encore</p>
            </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

    @yield('content')


<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>

</body>
</html>
