@extends('Templates.userTemplate')

@section('title','Editer mon profil')

@section('content')


{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-1 ">
            </div>


            <div class="col-sm-9">
                <div class="well owi12">
                    <h4>Ce que je fait</h4>
                    <p>{{ Form::text('biograph', null,array('class' => 'form-control'))}}</p>
                </div>
                <div class="row">
                    <div class="col-sm-3 owi12">
                        <div class="well">

                            <p>photo</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well owi12">
                            <h4>Nom</h4>
                            <p>{{ Form::text('name', null,array('class' => 'form-control'))}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well owi12">
                            <h4>Ventes</h4>
                            <p> *** <!-- where {id} = {Author_id} AND count where {dispo}=0--> beat(s) vendu(s)</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well owi12">
                            <h4>Contact</h4>
                            <p>{{ Form::email('email', null,array('class' => 'form-control'))}}</p>
                        </div>
                    </div>
                </div>
{{ Form::submit('Modifier mes informations!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
                <br>
                <br>

                <div class="row">
                    <div class="col-sm-12">
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
                                                    <source src=../../{{$value->link}} type="audio/mpeg">
                                                </audio>
                                            </div></td>
                                        <td>{{$value->price}}€</td>
                                        <td>ajouter</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection