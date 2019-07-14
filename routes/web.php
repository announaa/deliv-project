<?php

use App\address;
use App\user;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['verify' => true]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PagesController@index');
Route::get('/store/{id}', 'PagesController@store');
Route::get('/product/{id}', 'PagesController@product');
Route::get('/checkout', 'PagesController@checkout');
Route::get('/profile', 'PagesController@profile');
Route::get('/currency', 'PagesController@currency');
Route::get('/delfromcart/{id}', 'PagesController@delfromcart');
Route::get('/placeorder' , 'PagesController@placeorder');
Route::get('/delguy', 'PagesController@delguy');
Route::get('/stores', 'PagesController@allstores');
Route::get('/myjob', 'PagesController@myjob');
Route::get('/searchresult', 'PagesController@searchresult');
Route::get('/wishlist', 'PagesController@wishlist');
Route::get('/removefromnews', 'PagesController@removefromnews');
Route::get('/removefromwish/{id}', 'PagesController@removefromwish');
Route::get('/removefromorders/{id}', 'PagesController@removefromorders');
Route::get('/removefromnews', 'PagesController@removefromnews');
Route::post('/validateprofpic', 'Auth\RegisterController@validateprofpic');
Route::post('/addtocart' , 'PagesController@addtocart');
Route::post('/postdelguy', 'PagesController@postdelguy');
Route::post('/change_pp', 'PagesController@change_pp');
Route::post('/updateviewcart', 'PagesController@updateviewcart');
Route::post('/change_pass', 'PagesController@change_pass');
Route::post('/addtowishlist', 'PagesController@addtowish');
Route::post('/addtonews', 'PagesController@addtonews');



