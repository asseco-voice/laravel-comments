<?php

declare(strict_types=1);

namespace Asseco\Comments\App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Commentable
{
    public function comments(): MorphMany
    {
        $model = config('asseco-comments.models.comment');

        return $this->morphMany($model, 'commentable');
    }
}
