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
            @foreach($musics as $value)
                <tr>
                    <td>{{$value->title}}</td>

                    <td>
                        {{$value->price}}
                    </td>
                    <td>
                        {{$value->total}}
                    </td>
                    <td>

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
        <h1>Shipping</h1>
        <form action="/order" method="post" accept-charset="UTF-8">
            <label>Address</label>
            <textarea class="span4" name="address" rows="5"></textarea>
            <button class="btn btn-block btn-primary btn-large">Place order</button>
        </form>
    </div>
@stop