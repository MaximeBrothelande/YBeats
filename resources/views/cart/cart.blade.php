@extends('Templates.mainTemplate')

@section('content')

    <div class="container" style="width:60%">
        <h1>Your Cart</h1>
        <table class="table">
            <tbody>
            <tr>
                <td>
                    <b>Title</b>
                </td>
                <td>
                    <b>Price</b>
                </td>
                <td>
                    <b>Total</b>
                </td>
                <td>
                    <b>Delete</b>
                </td>
            </tr>
            @foreach($cart_music as $value)
                <tr>
                    <td>{{$value->musics->title}}</td>

                    <td>
                        {{$value->musics->price}}
                    </td>
                    <td>
                        {{$value->total}}
                    </td>
                    <td>
                        <a href="{{URL::route('delete_music_from_cart',array($value->id))}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <b>Total</b>
                </td>
                <td>
                    <b>{{$cart_total}}</b>
                </td>
                <td>
                </td>
            </tr>
            </tbody>
        </table>
        <form action="/order" method="post" accept-charset="UTF-8">
            <button class="btn btn-block btn-primary btn-large">Place order</button>
        </form>
    </div>
@stop