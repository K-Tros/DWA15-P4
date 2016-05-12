# Project 4 - Marvel Comic Collection Manager

## Live URL
<http://p4.krtsoftwaredev.me>

## Description
This is a multi-page Marvel Comic Collection Manager. Users can create accounts, and through those accounts they can search for Marvel Comics to add to their Collections or to their Wish Lists. They also have the ability to manage and view their Collections and Wish Lists, including removing comics from either, viewing the comics on Marvel's official page, and viewing a brief description of each comic.

This web application uses tools such as the Laravel framework, Bootstrap, and Guzzle HTTP client in order to provide content directly from Marvel Comics. Back end technologies include PHP, MySQL, and Apache.

All Marvel content is the property of Marvel Comics, and I (the developer) do not claim any ownership of the content. Content has been provided by Marvel Comics via their API (see https://developer.marvel.com for details).

## Demo
<http://screencast.com/t/MKQIArmu>

## Details for teaching team
I have attempted to set up a scheduled job in order to populate the Comics table with updated data from the Marvel API, but due to some difficulties I encountered during development (accidentally running out several days worth of my rate limit for the Marvel API), this feature is still not functional and in development. The code does exist, but is not running and is of questionable completeness (I intend to only have to check for content updated in the last 24 hours).

To deploy your own version of this project:
- Create a Marvel developer account at https://developer.marvel.com.
- Retrieve your public and private keys from your Marvel developer account.
- Add the IP address/domain that you plan to run this on to the list of authorized referrers. See Marvel's official API documentation for details on how to do this.
- Create **apis.php** in the **config** directory of your project. Copy and paste the template below, filling in your API keys where appropriate.

```php
<?php
return [
    'marvel_api_public_key' => 'YOUR_PUBLIC_KEY_HERE',
    'marvel_api_private_key' => 'YOUR_PRIVATE_KEY_HERE'
];
```


## Outside code
* Bootstrap: http://getbootstrap.com/
* Laravel: https://laravel.com/
* Guzzle: http://docs.guzzlephp.org/
* Marvel Comic API: https://developer.marvel.com

# Kevin's TODOs

* ~~"Remove" routing and logic needs to be done for Collection and Wishlist.~~
* ~~Search functionality needs to call Marvel's API.~~ Functional redesign; going to pre-load the comics table from the API, set up a scheduled job to update the table daily, and then just search on the table (rate limited API means that I can't afford to be hitting the API for every search).
* ~~"Add" functionality in Search results.~~ Maybe in the future I will change it so it doesn't have to refresh the page, but I don't think this is a priority for the due date.
* ~~Route validation!~~
* ~~Set up screens to display flash message.~~
* ~~Add Auth checks to routes.php so that everything important is limited to signed on users.~~
* ~~Fix all the URLs before deploying to prod (workaround for local dev right now).~~
* ~~Remove practice route prior to deploying.~~

# Potential Future Enhancements

* Fix css and other styling (kind of ugly right now, make it prettier).
* Rearrange things to do a fixed navbar.
* Cron job to keep DB updated (in progress).
* Enhance searching to include more search criteria.
* Paginate collections, wish lists, search results.
* Search feature in collection/wish list.
* Add quantity option when viewing collection.

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
