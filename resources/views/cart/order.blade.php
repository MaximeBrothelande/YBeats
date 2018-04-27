@extends('Templates.template2')

@section('title','Commandes')

@section('content')
    <br>
    <br>
    <br>
    <div class="container" style="width:60%">
        <h3>Mes commandes</h3>
        <div class="menu">
            <div class="accordion">
                @foreach($order as $value)
                    <div class="accordion-group">
                        <div class="accordion-heading country">
                            @if(Auth::user()->admin)
                                <a class="accordion-toggle" data-toggle="collapse" href="#order{{$value->id}}">Commande #{{$value->id}} - {{$value->User->name}} - {{$value->created_at}}</a>
                            @else
                                <a class="accordion-toggle" data-toggle="collapse" href="#order{{$value->id}}">Commande #{{$value->id}} - {{$value->created_at}}</a>
                            @endif
                        </div>
                        <div id="order{{$value->id}}" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <table class="table table-striped table-condensed">
                                    <thead>
                                    <tr>

                                        <th>
                                            Titre
                                        </th>
                                        <th>
                                            Audio
                                        </th>
                                        <th>
                                            Prix
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($value->orderItems as $orderitem)
                                        <tr>
                                            <td>{{$orderitem->title}}</td>
                                            <td>

                                                <audio controls >
                                                    <source src={{$orderitem->link}} type="audio/mpeg">
                                                </audio>

                                            </td>
                                            <td>{{$orderitem->pivot->price}}</td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><b>Total</b></td>
                                        <td><b>{{$value->total}}</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bonne écoute 🎶</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection