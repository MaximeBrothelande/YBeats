<?php

namespace App\Http\Controllers;

use App\Music;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class CartController extends Controller
{
    public function postAddToCart(){
        $rules=array(
            'music'=>'required|exists:musics,id'
        );
        $validator = Validator::make(Input::all(),$rules);

        if ($validator->fails())
        {
            return Redirect::route('music')->with('error','L\'ajout n\'a pas été effectué');
        }

        $member_id = Auth::user()->id;
        //dd($member_id);
        $music_id = Input::get('music');

        $music = Music::find($music_id);
        $author_id = $music->author;
        //dd($music);
        $total = $music->price;
        $count = Cart::where('id','=',$music_id)->count();
        if($count){
            return Redirect::route('music')->with('error','Déjà dans le panier');

        }

        Cart::create(
            array(
                'member_id'=>$member_id,
                'music_id'=>$music_id,
                'author_id'=>$author_id,
                'amount'=>'1',
                'total'=>$total
            ));

        return Redirect::route('cart');

    }

    public function getIndex()
    {
        $member_id = Auth::user()->id;
        //dd($member_id);
        $cart_music = Cart::with('musics')->where('member_id', '=', $member_id)->get();
        $cart_total = Cart::with('musics')->where('member_id', '=', $member_id)->sum('total');

        //dd($cart_music);
        if (!$cart_music) {
            return Redirect::route('index')->with('error', 'Le panier est vide');
        }

        return view('cart.cart', compact('cart_total', 'cart_music'));
    }




    public function showCart(){
        $musics=Music::all();
        $cart_total=$musics->sum('price');
        //$member_id = Auth::user()->id;
        return view('cart/add',compact('musics','cart_total'));
    }

    public function getDelete($id){

        $cart = Cart::find($id)->delete();

        return Redirect::route('cart');
    }

}
