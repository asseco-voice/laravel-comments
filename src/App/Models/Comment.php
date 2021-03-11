<?php

declare(strict_types=1);

namespace Asseco\Comments\App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Asseco\Comments\App\Traits\Commentable;

/**
 * Class Comment
 * @package Asseco\Comment\Models
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
