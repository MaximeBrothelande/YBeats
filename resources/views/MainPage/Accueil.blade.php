@extends('Templates.mainTemplate')

@section('title','YBeat')

@section('content')


    <div class="container text-center">
        <h3>Dernières sorties</h3><br>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                <table>
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
                            <td>ajouter</td>
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
                <table>
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