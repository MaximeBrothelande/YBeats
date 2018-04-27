@extends('Templates.template')

@section('title','YBeats')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img class="d-block w-100" src="../images/carousel04.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../images/carousel05.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../images/carousel06.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <section style="background-color: #00b0a7 " id="artists">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading text-white">Envie de vous faire connaitre?</h2>
                    <hr class="light my-4">
                    <p class="text-faded mb-4">Rejoignez la plateforme YBeats, vendez vos beats à des artistes et faites vous une réputation.</p>
                </div>
                <div class="container text-center">
                    <h3>Les artistes</h3><br>
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>Photo</td>
                                    <td>Nom</td>
                                    <td>Beats</td>
                                    <td>Profil</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $key=>$value)
                                    <tr>
                                        <td><img src="{{$value->profile_pic}}"></td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td><a class="btn btn-small btn-info" style="color: black" href="{{ URL::to('user/'.$value->id) }}"> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Voir le profil</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="musics">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Découvrez les beats récemment ajoutés, et soyez les premiers à les posséder.</h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="container text-center">
            <h3>Dernières sorties</h3><br>
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
                    <table class="table">
                        <thead>
                        <tr>
                            <td>id</td>
                            <td>titre</td>
                            <td>preview</td>
                            <td>ajouter</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($music as $key=>$value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->title}}</td>
                                <td><div id="aPlayer">
                                        <audio controls >
                                            <source src={{$value->Preview}} type="audio/mpeg">
                                        </audio>
                                    </div></td>
                                <td><form action="{{url('/cart/add')}}" name="add_to_cart" method="post" accept-charset="UTF-8" >
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="music" value="{{$value->id}}" />
                                        <p align="center"><button class="btn btn-info btn-block">Ajouter au panier</button></p>
                                    </form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="p-0" id="forum">
    </section>

    <section class="bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4">Pour que Ybeats devienne une plateforme d'échanges, de conseils et d'apprentissage.</h2>
            <a class="btn btn-light btn-xl sr-button" href="{{url('/forum')}}">Prochainement</a>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">Restons en contact</h2>
                    <hr class="my-4">
                    <p class="mb-5">Suivez nos réseaux sociaux pour ne manquer aucune actualité</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
                    <p>
                        <a href="mailto:your-email@your-domain.com">Ybeats-equipe@gmail.com</a>
                    </p>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fa fa-facebook fa-3x mb-3 sr-contact"></i>
                    <p>
                        <a href="#">Facebook</a>
                    </p>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fa fa-instagram fa-3x mb-3 sr-contact"></i>
                    <p>
                        <a href="#">Instagram</a>
                    </p>
                </div>

            </div>
        </div>
    </section>
































@endsection