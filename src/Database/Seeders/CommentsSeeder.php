<?php

declare(strict_types=1);

namespace Asseco\Comments\Database\Seeders;

use Asseco\Comments\App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        Comment::factory()->count(100)->create();
    }
}
