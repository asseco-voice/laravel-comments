<?php

use Asseco\Comment\App\Comment;

return [
    /**
     * Comment model which will be bound to the app.
     */
    'model' => Comment::class,

    /**
     * Path to Laravel models. This does not recurse in folders.
     */
    'models_path'     => app_path(),

    /**
     * Namespace for Laravel models.
     */
    'model_namespace' => 'App\\',

    /**
     * Namespace to Commentable trait.
     */
    'trait_path'      => Commentable::class,

    /**
     * Path to original stub which will create the migration upon publishing.
     */
    'stub_path' => '/../migrations/create_comments_table.php.stub',
];
