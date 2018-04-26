<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function postOrder(){
        $member_id =Auth::user()->id;

        $cart_musics =Cart::with('musics')->where('member_id','=',$member_id)->get();

        $cart_total=Cart::with('musics')->where('member_id','=',$member_id)->sum('total');

        if(!$cart_musics){

            return view('MainPage.Accueil')->with('error','Votre panier est vide');
        }

        $order = Order::create(
            array(
                'member_id'=>$member_id,
                'total'=>$cart_total
            ));

        foreach ($cart_musics as $order_musics) {
            //dd($order_musics->musics->price);
            $order->orderItems()->attach($order_musics->music_id, array(
                'amount'=>$order_musics->amount,
                'price'=>$order_musics->musics->price,
                'total'=>$order_musics->musics->price*$order_musics->amount
            ));

        }

        Cart::where('member_id','=',$member_id)->delete();

        return \redirect('music')->with('message','La commande est passée');

    }

    public function getIndex(){

        $member_id = Auth::user()->id;

        /*if(Auth::user()->admin){

            $orders=Order::all();

        }else{*/

            $order=Order::with('orderItems')->where('member_id','=',$member_id)->get();
            //dd($order);
        /*}*/

        return view('cart.order',compact('order'));

    }

}
