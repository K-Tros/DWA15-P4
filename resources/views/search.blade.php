@extends('layouts.master')

@section('nav')
    <nav class='navbar navbar-default'>
        <ul class='nav navbar-nav'>
            <li><a href='/Project4/public/'>Home</a></li>
            <li class='active'><a href='/Project4/public/search'>Search</a></li>
            <li><a href='/Project4/public/collection'>Collection</a></li>
            <li><a href='/Project4/public/wish-list'>Wishlist</a></li>
        </ul>
        <ul class='nav navbar-nav pull-right'>
            <li><a href='/Project4/public/login'>Log In</a></li>
            <li><a href='/Project4/public/sign-out'>Sign Out</a></li>
        </ul>
    </nav>
@stop

@section('title')
    Marvel Comic Search
@stop

@section('content')
    <h1>Marvel Comic Search</h1>
    <div class="collection center-block">
        <form class="searchform" action="/Project4/public/search" method="POST">
            {{ csrf_field() }}

            <label for="title">Comic Title</label>
            <input type="text" name="title" value="{{ old('paragraphs')}}">

            <input class='btn btn-primary' type='submit' value='Search:'>
        </form>
    </div>
    <br>
    <br>

    @if(isset($search_results))
        <section class='search-results container center-block"'>
            <p>
                Search Results here
            </p>
        </section>
    @endif
@stop
