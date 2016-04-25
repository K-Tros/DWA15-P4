@extends('layouts.master')

@section('nav')
    <nav class='navbar navbar-default'>
        <ul class='nav navbar-nav'>
            <li><a href='/Project4/public/'>Home</a></li>
            <li><a href='/Project4/public/search'>Search</a></li>
            <li><a href='/Project4/public/collection'>Collection</a></li>
            <li class='active'><a href='/Project4/public/wish-list'>Wishlist</a></li>
        </ul>
        <ul class='nav navbar-nav pull-right'>
            <li><a href='/Project4/public/login'>Log In</a></li>
            <li><a href='/Project4/public/sign-out'>Sign Out</a></li>
        </ul>
    </nav>
@stop

@section('title')
    Marvel Collection
@stop

@section('content')
    <h1>Marvel Wishlist Manager</h1>
    <div class="wishlist center-block">
        <ul>
            <li>comic1</li>
            <li>comic2</li>
        </ul>
    </div>
@stop
