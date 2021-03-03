# Asseco Comment

Purpose of this repository is to provide add comment any Laravel model. 

## Installation

Require the package with ``composer require asseco-voice/laravel-comment``.
Service provider will be registered automatically.


Publish configurations and migrations, then migrate comments table.

``` bash
$ php artisan vendor:publish
$ php artisan migrate
```



Add `Commentable` trait to your commentable model(s).

``` php
use Asseco\Comment\Contracts\Commentable;

class Product extends Model implements Commentable
{
    use Commentable;
    
    // ...   
}
