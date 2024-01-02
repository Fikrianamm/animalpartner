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
        $categoryId = mt_rand(1, 5);

        $categoryImageMap = [
            1 => "https://source.unsplash.com/500x400?cattle",
            2 => "https://source.unsplash.com/500x400?dog",
            3 => "https://source.unsplash.com/500x400?rabbit",
            4 => "https://source.unsplash.com/500x400?cat",
            5 => "https://source.unsplash.com/500x400?bird",
        ];

        return [
            'user_id' => mt_rand(1,15),
            'categories_id' => $categoryId,
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'body' => collect($this->faker->paragraphs(mt_rand(3,7)))->map(fn($p) => "<p>$p</p>")->implode(""),
            'image' => $categoryImageMap[$categoryId],
            'is_approved' => true,
        ];
    }
}
