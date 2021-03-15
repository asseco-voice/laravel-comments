<p align="center"><a href="https://see.asseco.com" target="_blank"><img src="https://github.com/asseco-voice/art/blob/main/evil_logo.png" width="500"></a></p>

# Laravel comments

Purpose of this repository is to provide adding comments to any Laravel model. 

## Installation

Require the package with ``composer require asseco-voice/laravel-comments``.
Service provider will be registered automatically.

Publish the configuration and migrations, then migrate comments table.

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
