<?php

namespace Asseco\Comments;

use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/asseco-comments.php', 'asseco-comments');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([__DIR__ . '/../config/asseco-comment.php' => config_path('asseco-comment.php')]);
    }
}
