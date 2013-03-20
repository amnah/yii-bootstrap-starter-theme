KBootstrap
==========

KBootstrap is simple Yii theme is for getting you up and running with Twitter's bootstrap 
very quickly. It is *simply* a theme and not a full-blown extension like 
[Chris83's](http://www.yiiframework.com/extension/bootstrap/). 

It does not have programming widgets; it is instead meant for people who prefer 
to write out all of the markup/code themselves.

**This theme does not contain any of the actual Twitter Bootstrap code. It gets the 
latest css and js files from http://bootstrapcdn.com.**

## Installation

* Extract files into the Yii application at **themes/kbootstrap/**

## Usage

* Add theme info into main configuration

```php
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Web Application',
    'theme'=>'kbootstrap', // THIS LINE HERE
```