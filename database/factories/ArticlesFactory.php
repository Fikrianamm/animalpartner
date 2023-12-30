<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticlesFactory extends Factory
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
            'category_id' => mt_rand(1,5),
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'body' => collect($this->faker->paragraphs(mt_rand(3,7)))->map(fn($p) => "<p>$p</p>")->implode(""),
            'image' => "https://source.unsplash.com/500x400?random",
            'is_approved' => true,
        ];
    }
}
