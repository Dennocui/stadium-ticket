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

//use App\Http\Controllers\customerController;

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/','PagesController@index');

Route::resource('event', 'EventController');
Route::resource('hall', 'HullController');
Route::resource('ticket', 'TicketController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
