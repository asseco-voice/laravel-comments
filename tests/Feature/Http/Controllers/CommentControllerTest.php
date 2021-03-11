<?php

declare(strict_types=1);

namespace Asseco\Comments\Tests\Feature\Http\Controllers;

use Asseco\Comments\App\Models\Comment;
use Asseco\Comments\Tests\TestCase;
use Illuminate\Support\Str;

class CommentControllerTest extends TestCase
{
    /** @test */
    public function can_fetch_all_comment_fields()
    {
        $this
            ->getJson(route('comments.index'))
            ->assertJsonCount(0);

        Comment::factory()->count(5)->create();

        $this
            ->getJson(route('comments.index'))
            ->assertJsonCount(5);

        $this->assertCount(5, Comment::all());
    }

    /** @test */
    public function creates_comment()
    {
        $request = Comment::factory()->make()->toArray();

        $this
            ->postJson(route('comments.store'), $request)
            ->assertJsonFragment([
                'id'   => 1,
                'body' => $request['body']
            ]);

        $this->assertCount(1, Comment::all());
    }

    /** @test */
    public function can_return_comment_by_id()
    {
        Comment::factory()->count(5)->create();

        $this
            ->getJson(route('comments.show', 3))
            ->assertJsonFragment(['id' => 3]);
    }

    /** @test */
    public function can_update_comment()
    {
        $comment = Comment::factory()->create();

        $request = [
            'body' => 'updated_name',
        ];

        $this
            ->putJson(route('comments.update', $comment->id), $request)
            ->assertJsonFragment([
                'body' => $request['body'],
            ]);

        $this->assertEquals($request['body'], $comment->refresh()->body);
    }

    /** @test */
    public function can_delete_comment()
    {
        $comment = Comment::factory()->create();

        $this->assertCount(1, Comment::all());

        $this
            ->deleteJson(route('comments.destroy', $comment->id))
            ->assertOk();

        $this->assertCount(0, Comment::all());
    }
}
