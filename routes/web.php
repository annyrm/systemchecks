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

//Route::get('/', function () {
    //return view('home');
//});

Route::get('/', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['middleware'=>'auth'],function(){//
  Route::get('cheques', 'CheckController@getIndex');
});


Route::group(['middleware' => 'admin'], function () {
  Route::get('cheques/alta', 'CheckController@getCreate');
  Route::post('cheques/alta', 'CheckController@postCreate');
});




//Route::get('cheques', function () {
//    return view('home');;//return view('welcome');
//});
//Route::get('cheques/alta', function () {
//    return "Alta";//return view('welcome');
//});
//Auth::routes();

//Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
