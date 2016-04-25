<?php

namespace Project4\Http\Controllers;

use Illuminate\Http\Request;

use Project4\Http\Requests;

class ComicController extends Controller
{
    public function postSearch() {
        $search_results = 'value';
        return view('search')->with('search_results', $search_results);
    }
}
