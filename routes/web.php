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


//Page accueil Laravel - TEST
Route::get('/', function () {
    return view('welcome');
});
Route::get('/Test', function (){
   return view('Templates/mainTemplate');
});


Route::post('/cart/add','CartController@postAddToCart');
Route::get('/cart', 'CartController@showCart');




//Routes LOGIN/REGISTER a revoir


Route::auth();

/*
Route::get('/login', function (){
   return view('Login/login');
});

route::post('login','Auth\LoginController@logout');

Route::post('register','Auth\LoginController@login');

Route::get('/register',function (){
   return view('Login/register');
});*/
