@extends('layouts.master')

@section('title')
    Marvel Comic Search
@stop

@section('content')
    <h1>Marvel Comic Search</h1>

    <div class="search center-block">
    @if(Auth::check())
        <form class="searchform" action="/Project4/public/search" method="POST">
            {{ csrf_field() }}

            <label for="title">Comic Title</label>
            <input type="text" name="title" value="{{ old('title')}}">
            <br>

            <input class='btn btn-primary' type='submit' value='Search:'>
        </form>
    @else
        <p>
            Want to search for comics? <a href='/Project4/public/login'>Log in</a> or <a href='/Project4/public/register'>Register</a> now!
        </p>
    @endif
    </div>
    <br>
    <br>

    @if(isset($search_results))
        <section class='search-results container center-block"'>
            <ul>
                @foreach($search_results as $comic)
                    <li>
                        <div class="comic-title">
                            {{ $comic->title }}
                        </div>
                        <br>
                        <div class="container">
                            <img src="{{ $comic->thumbnail_url }}" alt="{{ $comic->thumbnail_url }}" height="150px" width="auto" />
                        </div>
                        <br>
                        <a href="{{ $comic->marvel_url }}">View on Marvel.com</a>
                        <br>
                        <a href="/Project4/public/collection/add/{{ $comic->id }}">Add to Collection</a>
                        <br> <a href="/Project4/public/wish-list/add/{{ $comic->id }}">Add to Wish List</a>
                    </li>
                    <br>
                @endforeach
            </ul>
        </section>
    @endif
@stop
