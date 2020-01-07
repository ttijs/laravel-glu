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
    return view('home');
});

Route::get('/mijn-werk', 'PortfolioItemsController@index');

Route::get('/mijn-werk/{slug}', 'PortfolioItemsController@show');

Route::get('/contact', 'ContactController@index');

// Dit is een post en onderstaand is nodig om de velden van het formulier op te vangen
Route::post('/contact', 'ContactController@store');

//Route::get('/contact-email', function(){
//    \Illuminate\Support\Facades\Mail::to('james.bond@double07.com')->send(new \App\Mail\ContactMail());
//    return new \App\Mail\ContactMail();
//});

Route::get('/blog', 'BlogsController@index');

Route::get('/blog/create', 'BlogsController@create');

// Dit is een post en onderstaand is nodig om de velden van het formulier op te vangen
Route::post('/blog', 'BlogsController@store');

Route::get('/blog/{blog}', 'BlogsController@show');
Route::get('/blog/{blog}/edit', 'BlogsController@edit');
Route::put('/blog/{blog}', 'BlogsController@update');
