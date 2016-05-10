@extends('layouts.master')

@section('title')
    Marvel Collection
@stop

@section('content')
    <h1>Marvel Collection Manager</h1>

    <div class="collection center-block">
    @if(Auth::check())
        @if(isset($comics))
            <ul>
                @foreach($comics as $comic)
                    @if($comic->pivot->collection_count > 0)
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
                            <a href="{{ $comic->marvel_url }}">View on Marvel.com</a>
                            <br>
                            <a href="/collection/remove/{{ $comic->id }}">Remove from Collection</a>
                        </li>
                        <br>
                    @endif
                @endforeach
            </ul>
        @else
            <p>
                You have not added any comics yet! <a href="/search">Search</a> for comics to add some!
            </p>
        @endif
    @else
        <p>
            Want to manage YOUR collection? <a href='/login'>Log in</a> or <a href='/register'>Register</a> now!
        </p>
    @endif
    </div>
@stop
