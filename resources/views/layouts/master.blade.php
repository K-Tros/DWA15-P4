<!doctype html>
<html>
<head>
    <title>
        @yield('title','Default')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css' rel='stylesheet'>

    <link href='css/common.css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
    <nav class='navbar navbar-default'>
        <ul class='nav navbar-nav'>
            <li class="{{ Request::path() == '/' ? 'active' : '' }}"><a href='/Project4/public/'>Home</a></li>
            <li class="{{ Request::path() == 'search' ? 'active' : '' }}"><a href='/Project4/public/search'>Search</a></li>
            <li class="{{ Request::path() == 'collection' ? 'active' : '' }}"><a href='/Project4/public/collection'>Collection</a></li>
            <li class="{{ Request::path() == 'wish-list' ? 'active' : '' }}"><a href='/Project4/public/wish-list'>Wish List</a></li>
        </ul>
        <ul class='nav navbar-nav pull-right'>
            @if(Auth::check())
                <li><a href='/Project4/public/logout'>Sign Out</a></li>
            @else
                <li class="{{ Request::path() == 'login' ? 'active' : '' }}"><a href='/Project4/public/login'>Log In</a></li>
                <li class="{{ Request::path() == 'register' ? 'active' : '' }}"><a href='/Project4/public/register'>Register</a></li>
            @endif
        </ul>
    </nav>

    <section class="container center-block">
        @yield('content')
    </section>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>

<footer class='footer navbar-fixed-bottom'>
    &copy; {{ date('Y') }} &nbsp;&nbsp;
    <a href='https://github.com/K-Tros/DWA15-P4' class='fa fa-github' target='_blank'> View on Github</a> &nbsp;&nbsp;
    <div class='fa'>Data provided by Marvel. <i class="fa fa-copyright"></i> 2014 Marvel</div> &nbsp;&nbsp;
</footer>

</html>
