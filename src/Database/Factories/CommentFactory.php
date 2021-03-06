<?php

namespace Asseco\Comments\Database\Factories;

use Asseco\Comments\App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'             => $this->faker->sentence(),
            'commentable_type' => 'App\\Random\\' . ucfirst($this->faker->word),
            'commentable_id'   => $this->faker->randomNumber(),
        ];
    }
}
