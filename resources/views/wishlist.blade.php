@extends('layouts.master')

@section('title')
    Marvel Collection
@stop

@section('content')
    <h1>Marvel Wish List Manager</h1>

    <div class="wishlist center-block">
    @if(Auth::check())
        @if(isset($comics))
            <ul>
                @foreach($comics as $comic)
                    @if($comic->pivot->wishlist_count > 0)
                        <li>
                            <div class="comic-title">
                                {{ $comic->title }}
                            </div>
                            <br>
                            <div class="container">
                                <img src="{{ $comic->thumbnail_url }}" alt="{{ $comic->thumbnail_url }}" height="150px" width="auto" />
                                <div class="container">
                                    {{ $comic->description }}
                                </div>
                            </div>
                            <br>
                            <a href="{{ $comic->marvel_url}}">View on Marvel.com</a>
                            <br>
                            <a href="/Project4/public/wish-list/remove/{{ $comic->id }}">Remove from Wish List</a>
                        </li>
                        <br>
                    @endif
                @endforeach
            </ul>
        @else
            <p>
                You have not added any comics yet! <a href="/Project4/public/search">Search</a> for comics to add some!
            </p>
        @endif
    @else
        <p>
            Want to manage YOUR wishlist? <a href='/Project4/public/login'>Log in</a> or <a href='/Project4/public/register'>Register</a> now!
        </p>
    @endif
    </div>
@stop
