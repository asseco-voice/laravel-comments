<?php

declare(strict_types=1);

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
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        if (config('asseco-comments.runs_migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        }
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../migrations' => database_path('migrations'),
        ], 'asseco-comments');

        $this->publishes([
            __DIR__ . '/../config/asseco-comments.php' => config_path('asseco-comments.php'),
        ], 'asseco-comments');
    }
}
