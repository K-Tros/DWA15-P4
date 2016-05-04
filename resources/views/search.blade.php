@extends('layouts.master')

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
