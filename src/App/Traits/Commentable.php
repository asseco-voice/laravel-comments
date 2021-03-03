<?php

declare(strict_types=1);

namespace Asseco\Comment\App\Traits;

use Asseco\Comment\App\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Commentable
{
    public function comment(Commentable $commentable, string $commentText = ''): Comment
    {
        $commentModel = config('comment.model');
        $user = auth()->user();
        $comment = new $commentModel([
            'comment'        => $commentText,
            'created_by'     => $user->getId(),
            'commented_id'   => $this->primaryId(),
            'commented_type' => get_class(),
        ]);

        $commentable->comments()->save($comment);

        return $comment;
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(config('comment.model'), 'commented');
    }

    private function primaryId(): string
    {
        return (string)$this->getAttribute($this->primaryKey);
    }
}
