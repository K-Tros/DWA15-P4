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

Route::get('/practice', function() {

    $request = new Illuminate\Http\Request();
    $request->replace(array('limit' => 100,
                            'offset' => 100));

    $helper = new \Project4\Libraries\MarvelAPIHelper();

    $comics = $helper->getComicsFromAPI($request);
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('/search', 'ComicController@postSearch');

    // not really the best to use a get here, but kind of had to so that remove could work in an anchor tag
    // TODO should probably try to find a way to change the add and remove methods to use a post and to stay on the same page
    Route::get('/collection/add/{id?}', 'ComicController@getCollectionAdd');

    // not really the best to use a get here, but kind of had to so that remove could work in an anchor tag
    Route::get('/wish-list/add/{id?}', 'ComicController@getWishListAdd');

    // not really the best to use a get here, but kind of had to so that remove could work in an anchor tag
    Route::get('/wish-list/remove/{id?}', function($id = null) {
        // comic for user and set wishlist to 0
        $user = \Project4\User::where('id', '=', \Auth::id())->first();
        $user->comics()->updateExistingPivot($id, ['wishlist'=> 0]);

        // check if collection is also zero and detach if it is
        $comics = $user->comics;
        foreach ($comics as $comic) {
            if ($comic->id == $id && $comic->pivot->collection == 0) {
                $user->comics()->detach($id);
            }
        }

        \Session::flash('message','Comic successfully removed from your wish list.');
        return redirect('/wish-list');
    });

    // not really the best to use a get here, but kind of had to so that remove could work in an anchor tag
    Route::get('/collection/remove/{id?}', function($id = null) {
        // comic for user and set collection to 0
        $user = \Project4\User::where('id', '=', \Auth::id())->first();
        $user->comics()->updateExistingPivot($id, ['collection'=> 0]);

        // check if wishlist is also zero and detach if it is
        $comics = $user->comics;
        foreach ($comics as $comic) {
            if ($comic->id == $id && $comic->pivot->wishlist == 0) {
                $user->comics()->detach($id);
            }
        }

        \Session::flash('message','Comic successfully removed from your collection.');
        return redirect('/collection');
    });
});
