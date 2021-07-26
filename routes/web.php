<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);  //لازم يروح ياكد الايميل تبعه بعدين يعمل Login

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


//facebook login

Route::get('/redirect/{service}', 'SocialController@redirect'); //يوديك على facebook

Route::get('/callback/{service}', 'SocialController@callback');  //يرجعك على الموقع
