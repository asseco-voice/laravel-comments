<?php

declare(strict_types=1);

namespace Asseco\Comments\App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Commentable
{
    public function comments(): MorphMany
    {
        $model = config('asseco-comments.comment_model');

        return $this->morphMany($model, 'commentable');
    }
}
