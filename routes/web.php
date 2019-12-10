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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('teams', 'TeamController');
Route::resource('fixtures', 'FixtureController');
Route::resource('tickets', 'TicketController');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

// ajax routes
Route::post('fetch-fixture-info/{id}', 'FixtureController@fetchInfo')->name('fetch-fixture-info');
// ajax
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');