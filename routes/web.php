<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/index', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/filtrer', 'HomeController@filtrer')->name('filtrer');
Route::get('/update', 'HomeController@update')->name('update');
Route::get('/chercher', 'HomeController@chercher')->name('chercher');
Route::get('/cherchertelephone', 'HomeController@cherchertelephone')->name('cherchertelephone');

Route::get('/add_commentaire','HomeController@addcommentaire')->name('add_commentaire');


Route::get('/statistique', 'HomeController@statistique')->name('statistique');

Route::get('/add_associe', 'HomeController@add_associe')->name('add_associe');