<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ressources / Auth
Route::resource('music','MusicController');
Route::resource('user','UserController');
Route::auth();

//Panier
Route::get('/cart', array('before'=>'auth.basic','as'=>'cart','uses'=>'CartController@getIndex'));
Route::post('/cart/add', array('before'=>'auth.basic','uses'=>'CartController@postAddToCart'));
Route::get('/cart/delete/{id}', array('before'=>'auth.basic','as'=>'delete_music_from_cart','uses'=>'CartController@getDelete'));

//Order
Route::post('/order', array('before'=>'auth.basic','uses'=>'OrderController@postOrder'));
Route::get('/orders', array('before'=>'auth.basic','as'=>'order','uses'=>'OrderController@getIndex'));

Route::get('/forum',function(){
   return view('MainPage.comingSoon');
});

//Page accueil Laravel - TEST
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/Test', function (){
    return view('Templates/mainTemplate');
});


