<?php

declare(strict_types=1);

namespace Asseco\Comments\App;

use Asseco\Comments\App\Traits\Commentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Comment.
 */
class Comment extends Model
{
    use Commentable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all of the models that own comments.
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
