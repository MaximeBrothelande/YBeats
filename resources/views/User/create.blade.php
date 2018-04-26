<!-- FORMULAIRE D'UPLOAD DE MUSIQUES -->
@extends('Templates.userTemplate')

@section('title','Ajout de beat')

@section('content')

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-1 ">
        </div>
        <div class="col-sm-9">
            <div class="well owi12">
                <h4>Ce que je fait</h4>
                <p>{{$user->biograph}}</p>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="well owi12">

                        <p>photo</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well owi12">
                        <h4>Nom</h4>
                        <p>{{$user->name}}</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well owi12">
                        <h4>Ventes</h4>
                        <p> *** <!-- where {id} = {Author_id} AND count where {dispo}=0--> beat(s) vendu(s)</p>
                    </div>
                </div>
                <div class="col-sm-3 ">
                    <div class="well owi13">
                        <h4>Contact</h4>
                        <p>{{$user->email}}</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="well">
                        <p>Mes beats</p>

                        <table class="table">
                            <thead>
                            <tr>
                                <td>Titre</td>
                                <td>Description</td>
                                <td>Preview</td>
                                <td>Prix</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($music as $key=>$value)
                                <tr>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->descrip}}</td>
                                    <td><div id="aPlayer">
                                            <audio controls >
                                                <source src=../{{$value->Preview}} type="audio/mpeg">
                                            </audio>
                                        </div></td>
                                    <td>{{$value->price}}€</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                            {{ Form::open(array('url' => 'user')) }}
                                <tr>
                                    <td>{{ Form::text('title', null,array('class' => 'form-control'))}}</td>
                                    <td>{{ Form::text('descrip', null,array('class' => 'form-control'))}}</td>
                                    <td>{{ Form::file('link', array('required' => '')) }}</td>
                                    <td>{{ Form::text('price', null,array('class' => 'form-control'))}}</td>
                                    <td>{{ Form::submit('upload', array('class' => 'btn btn-primary')) }}</td>
                                </tr>
                            {{ Form::close() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection
