<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1,15),
            'forum_post_id' => mt_rand(1,10),
            'body' => collect($this->faker->paragraphs(mt_rand(3,7)))->map(fn($p) => "<p>$p</p>")->implode(""),
        ];
    }
}
