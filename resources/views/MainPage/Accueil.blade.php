@extends('Templates.mainTemplate')

@section('title','YBeat')

@section('content')


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
                                        <source src={{$value->link}} type="audio/mpeg">
                                    </audio>
                                </div></td>
                            <td><form action="{{url('/cart/add')}}" name="add_to_cart" method="post" accept-charset="UTF-8" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="music" value="{{$value->id}}" />
                                    <p align="center"><button class="btn btn-info btn-block">Add to Cart</button></p>
                                </form></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="container text-center">
        <h3>Les artistes</h3><br>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <table class="table">
                    <thead>
                    <tr>
                        <td>pic</td>
                        <td>name</td>
                        <td>musics</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $key=>$value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td><li><a href="{{ URL::to('user/'.$value->id) }}">Voir le profil</a></li></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection