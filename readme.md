# Kevin's TODOs

* ~~"Remove" routing and logic needs to be done for Collection and Wishlist.~~
* ~~Search functionality needs to call Marvel's API.~~ Functional redesign; going to pre-load the comics table from the API, set up a scheduled job to update the table daily, and then just search on the table (rate limited API means that I can't afford to be hitting the API for every search).
* ~~"Add" functionality in Search results.~~ Maybe in the future I will change it so it doesn't have to refresh the page, but I don't think this is a priority for the due date.
* Route validation!
* Set up screens to display flash message.
* ~~Add Auth checks to routes.php so that everything important is limited to signed on users.~~
* Fix css and other styling (kind of ugly right now).
* Fix all the URLs before deploying to prod (workaround for local dev right now).
* Remove practice route prior to deploying.

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
