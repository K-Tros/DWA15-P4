<?php

namespace Project4\Http\Controllers;

use Illuminate\Http\Request;

use Project4\Http\Requests;

class ComicController extends Controller
{
    public function postSearch(Request $request) {

        $this->validate($request, [
            'title' => 'required|min:3|alpha_num',
        ]);

        $search_results = \Project4\Comic::comicSearch($request);
        return view('search')->with('search_results', $search_results);
    }

    public function getCollectionAdd($id = null) {
        if(isset($id)) {
            \Project4\Comic::addComicToUserCollection($id);

            // return to the search view
            // TODO try to pass the search results back in to give the illusion that the page didn't change?
            \Session::flash('message','Comic successfully added to your collection.');
        }
        else {
            \Session::flash('message','Cannot add comic with null ID.');
        }
        return redirect('/search');
    }

    public function getWishListAdd($id = null) {
        if(isset($id)) {
            \Project4\Comic::addComicToUserWishList($id);

            // return to the search view
            // TODO try to pass the search results back in to give the illusion that the page didn't change?
            \Session::flash('message','Comic successfully added to your wish list.');
        }
        else {
            \Session::flash('message','Cannot add comic with null ID.');
        }
        return redirect('/search');
    }
}
