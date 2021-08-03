<?php

use Asseco\Comments\App\Models\Comment;

return [
    /**
     * Model which will be bound to the app.
     */
    'comment_model'   => Comment::class,

    /**
     * Should the package run the migrations. Set to false if you're publishing
     * and changing default migrations.
     */
    'runs_migrations' => true,
];
