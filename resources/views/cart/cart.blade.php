@extends('Templates.mainTemplate')

@section('content')

    <div class="container" style="width:60%">
        <h1>Mon panier</h1>
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
                        <a href="{{URL::route('delete_music_from_cart',array($value->id))}}">Supprimer</a>
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
        <form action="{{url('order')}}" method="post" accept-charset="UTF-8">
            {{ csrf_field() }}

            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_pIaGoPD69OsOWmh1FIE8Hl4J"
                    data-amount="{{$cart_total*100}}"
                    data-name="Payement"
                    data-description="Online course about integrating Stripe"
                    data-image="../images/icone.png"
                    data-locale="auto"
                    data-currency="eur">
            </script>
            <script>
                document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
            </script>
            <button class="btn btn-block btn-primary btn-large">Payement</button>
        </form>




    </div>
@stop