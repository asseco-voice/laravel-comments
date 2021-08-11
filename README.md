<p align="center"><a href="https://see.asseco.com" target="_blank"><img src="https://github.com/asseco-voice/art/blob/main/evil_logo.png" width="500"></a></p>

# Comments

Purpose of this repository is to enable adding comments to any Laravel model. 

## Installation

Require the package with ``composer require asseco-voice/laravel-comments``.
Service provider will be registered automatically.

## Setup 

In order to use the package, migrate the tables with ``artisan migrate``
and add `Commentable` trait to model you'd like to have comment support on.

```php
use Asseco\Comment\Contracts\Commentable;

class Product extends Model implements Commentable
{
    use Commentable;
    
    // ...   
}
```

Standard CRUD endpoints are exposed for comment administration, however if
you'd like a dedicated controller to manage CRUD actions on a specific model
you need to manually create it.


# Extending the package

Publishing the configuration will enable you to change package models as
well as controlling how migrations behave. If extending the model, make sure
you're extending the original model in your implementation.
