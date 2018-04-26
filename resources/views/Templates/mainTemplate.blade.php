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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">


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
            <img src="../images/logo.png">

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/MusicApp/public/index.php/music">Accueil</a></li>
                <li><a href="/MusicApp/public/index.php/artists">Artistes</a></li>
                <li><a href="/MusicApp/public/index.php/forum">Forum</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    @if(App::environment() =='local')
                        <li><a href="{{ url('/register') }}">S'inscrire</a></li>
                    @endif
                @else
                    <li><a href="{{url('/cart')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Mon panier</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="bordered inverted teal user icon"></i>{{ Auth::user()->name }} <span class="caret"> </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('/user/'.Auth::user()->id.'/edit')}}"><span class="	glyphicon glyphicon-user"></span> Mon profil </a></li>
                            <li><a href="{{url('/user/create')}}"><span class="glyphicon glyphicon-upload"></span> Ajout de musique</a></li>
                            <li><a href="{{url('/orders')}}"><span class="glyphicon glyphicon-download"></span> Mes commandes</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
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
                <h3>Découvrez les artistes et les beatmakers</h3>
                <p>et achetez les intrus qui vous correspondent!</p>
            </div>
        </div>

        <div class="item">
            <img src="../images/background2.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Bénéficiez de réductions sur les beats</h3>
                <p>avec l'abonnement Ybeats</p>
            </div>
        </div>

        <div class="item">
            <img src="../images/background4.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Studio d'enregistrement:</h3>
                <p>Disponible prochainement</p>
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
</div>

    @yield('content')


<footer class="container-fluid text-center">
    <i class="fab fa-facebook-f"><a href="#"> Facebook</a></i>
    <i class="fab fa-instagram"><a href="#"> Instagram</a></i>
</footer>

</body>
</html>
