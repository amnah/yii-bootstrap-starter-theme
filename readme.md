Yii Bootstrap Starter Theme
==========

This is a simple Yii theme for getting you up and running with Twitter's bootstrap. It is *simply* a theme and not a full-blown extension like
[Chris83's](http://www.yiiframework.com/extension/bootstrap/).

It does not have programming widgets because it is meant for people who prefer
to write out all of the markup/code themselves.

**This theme does not contain any of the actual Twitter Bootstrap code. It gets the
latest css and js files from http://bootstrapcdn.com.**

**However, it does contain the html5shiv.js and respond.js for IE8 support.**

## Installation

* Extract files into the Yii application at **themes/[name of theme]/**

## Usage

* Add theme info into main configuration

```php
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Web Application',
    'theme'=>'[name of theme]', // THIS LINE HERE
```

* Update versions if desired (in **views/layouts/main.php**)

```php
<?php 

// define versions
$bootstrapVersion = "3.0.0";
$fontAwesomeVersion = "3.2.1";
$jqueryVersion = "2.0.3";
$queryUiVersion = "1.10.3";
```
