@extends('layouts.master')

@section('nav')
    <nav class='navbar navbar-default'>
        <ul class='nav navbar-nav'>
            <li class='active'><a href='/Project4/public/'>Home</a></li>
            <li><a href='/Project4/public/search'>Search</a></li>
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
    Welcome to Marvel Collection Manager!
@stop

@section('content')
    <h1>Welcome to Marvel Collection Manager!</h1>
    <p>
        This tool is for avid Marvel comic collectors to help them manage their collections. By logging in with your account, you will have access to search for and select Marvel comics which you already have, as well as view comics that you may want to add to your collection. Use the navigation above to search for comics, view your current collection, or view your wishlist!
    </p>
@stop
