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

Route::get('/mijn-werk', 'PortfolioItemsController@list');

Route::get('/mijn-werk/{slug}', 'PortfolioItemsController@item');

Route::get('/contact', function () {
    return view('contact');
});

// Dit is nodig om de velden van het formulier op te vangen
Route::post('/contact', 'ContactController@post');

Route::get('/blog', function () {
    return view('blog');
});
