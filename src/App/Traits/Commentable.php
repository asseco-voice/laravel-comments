<?php

declare(strict_types=1);

namespace Asseco\Comments\App\Traits;

use Asseco\Comments\App\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Commentable
{
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
