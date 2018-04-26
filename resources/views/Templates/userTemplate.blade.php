<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$user->name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
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

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 100%;}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {height: auto;}
        }

        body
        {
            height: 100%;
            background-image: radial-gradient( circle at top left,black, #00b0a7, #f06eaf);
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
            z-index: 10;
            position: relative;

        }
        .owi12{
            height: 150px;

        }
        .owi13{
            min-width: 200px;
            height: 150px;

        }
        .owi11{
            clear: both;
            position: relative;
            z-index: 10;
            height: 3em;
            margin-top: -3em;
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
                    <li><a href="{{ url('/login') }}"><span class=glyphicon glyphicon-log-in"></span>Connexion</a></li>
                    @if(App::environment() =='local')
                        <li><a href="{{ url('/register') }}">S'inscrire</a></li>
                    @endif
                @else
                    <li><a href="{{url('/cart')}}">Mon panier</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="bordered inverted teal user icon"></i>{{ Auth::user()->name }} <span class="caret"> </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{url('/user/'.Auth::user()->id.'/edit')}}">Profil</a></li>
                            <li><a href="{{url('/user/create')}}">Ajout de musique</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
<br>
<br>
<br>
<br>
<br>

@yield('content')

<div class="row">
    <div class="col-sm-12">
        <div class="well owi1">
            <p>Footer Text</p>
        </div>
    </div>
</div>


</body>
</html>
