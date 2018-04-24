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
Route::resource('music','MusicController');
Route::resource('user','UserController');
Route::auth();



//Page accueil Laravel - TEST
Route::get('/', function () {
    return view('welcome');
});
Route::get('/Test', function (){
   return view('Templates/mainTemplate');
});

/*Route::get('/music', ['as' => 'music', function () {
    return view('MainPage.Accueil');
}]);*/


//Test CART

Route::get('/cart', array('before'=>'auth.basic','as'=>'cart','uses'=>'CartController@getIndex'));
Route::post('/cart/add', array('before'=>'auth.basic','uses'=>'CartController@postAddToCart'));
Route::get('/cart/delete/{id}', array('before'=>'auth.basic','as'=>'delete_music_from_cart','uses'=>'CartController@getDelete'));

//Route::post('/cart/add','CartController@postAddToCart');
//Route::get('/cart', 'CartController@showCart');




