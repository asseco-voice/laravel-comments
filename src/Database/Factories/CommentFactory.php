<?php

declare(strict_types=1);

namespace Asseco\Comments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function modelName()
    {
        return config('asseco-comments.models.comment');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [
            'body'             => $this->faker->sentence(),
            'commentable_type' => 'App\\Random\\' . ucfirst($this->faker->word),
            'commentable_id'   => $this->faker->randomNumber(),
        ];

        if(config('asseco-comments.migrations.uuid')){
            $data = array_merge($data, [
                'commentable_id'   => $this->faker->uuid(),
            ]);
        }

        return $data;
    }
}
