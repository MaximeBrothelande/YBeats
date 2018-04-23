<?php

namespace App\Http\Controllers;

use App\Music;
use Darryldecode\Cart\Cart;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function postAddToCart(){
        $rules=array(
            'title'=>'required|exists:musics,id',
            'price'=>'required|numeric'
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails())
        {
            return Redirect::route('index')->with('error','L\'ajout n\'a pas été effectué');
        }

        //$member_id = Auth::user()->id;
        $music_id = Input::get('title');
        $price = Input::get('price');

        $music = Music::find($music_id);
        $total = $price*$music->price;

        $count = Cart::where('title','=',$music_id)->count();
        if($count){
            return Redirect::route('index')->with('error','Already in cart');

        }

        Cart::create(
            array(
                //'member_id'=>$member_id,
                'music_id'=>$music_id,
                'total'=>$total
            ));

        return Redirect::route('cart');

    }

    public function showCart(){
        $musics=Music::all();
        $cart_total=$musics->sum('price');
        //$member_id = Auth::user()->id;
        return view('cart/add',compact('musics','cart_total'));
    }
}
