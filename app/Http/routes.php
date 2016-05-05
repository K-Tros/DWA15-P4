<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/collection', function ()
{
    $comics = null;
    if (Auth::check()) {
        $comics = \Project4\Comic::getComicsForCurrentUser();
    }

    return view('collection',[
        'comics' => $comics
    ]);
});

Route::get('/wish-list', function () {
    $comics = null;
    if (Auth::check()) {
        $comics = \Project4\Comic::getComicsForCurrentUser();
    }

    return view('wishlist',[
        'comics' => $comics
    ]);
});

Route::get('/search', function () {
    return view('search');
});

Route::post('/search', 'ComicController@postSearch');

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@logout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');
