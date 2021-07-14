### ImgProxy PHP

This is a PHP library that makes it easy to build URL for [ImgProxy](https://imgproxy.net).

[![Version][version-badge]][version-link]
[![Total Downloads][downloads-badge]][downloads-link]
[![Php][php-badge]][php-link]
[![License][license-badge]](LICENSE)
[![Build Status][build-badge]][build-link]

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require onliner/imgproxy-php:^0.1
```

or add this code line to the `require` section of your `composer.json` file:

```
"onliner/imgproxy-php": "^0.1"
```

Usage
-----

```php
$key = getenv('IMGPROXY_KEY');
$salt = getenv('IMGPROXY_SALT');

$src = 'http://example.com/image.jpg';

$builder = UrlBuilder::signed($key, $salt);
$builder = $builder->with(
    new Dpr(2),
    new Quality(90),
    new Width(300),
    new Height(400)
);
    
$url = $builder->url($src);  // encoded url
$url = $builder->encoded(false)->url($src); // plain url
$url = $builder->url($src, 'png'); // change image format

# example: /9SaGqJILqstFsWthdP/dpr:2/q:90/w:300/h:400/aHR0cDovL2V4YW1w/bGUuY29tL2ltYWdl/LmpwZw
```

License
-------

Released under the [MIT license](LICENSE).


[version-badge]:    https://img.shields.io/packagist/v/onliner/imgproxy-php.svg
[version-link]:     https://packagist.org/packages/onliner/imgproxy-php
[downloads-link]:   https://packagist.org/packages/onliner/imgproxy-php
[downloads-badge]:  https://poser.pugx.org/onliner/imgproxy-php/downloads.png
[php-badge]:        https://img.shields.io/badge/php-7.2+-brightgreen.svg
[php-link]:         https://www.php.net/
[license-badge]:    https://img.shields.io/badge/license-MIT-brightgreen.svg
[build-link]:       https://github.com/onliner/imgproxy-php/actions?workflow=test
[build-badge]:      https://github.com/onliner/imgproxy-php/workflows/test/badge.svg
