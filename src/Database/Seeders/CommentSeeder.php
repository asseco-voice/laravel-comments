<?php

declare(strict_types=1);

namespace Asseco\Comments\Database\Seeders;

use Asseco\Comments\App\Contracts\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        /** @var Comment $comment */
        $comment = app(Comment::class);

        $comment::factory()->count(100)->create();
    }
}
