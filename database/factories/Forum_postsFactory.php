<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Forum_posts>
 */
class Forum_postsFactory extends Factory
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
            1 => "https://source.unsplash.com/500x400?Anjing",
            2 => "https://source.unsplash.com/500x400?Kucing",
            3 => "https://source.unsplash.com/500x400?Burung",
            4 => "https://source.unsplash.com/500x400?Hewan%20Ternak",
            5 => "https://source.unsplash.com/500x400?Kelinci",
        ];

        return [
            'user_id' => mt_rand(1,15),
                'categories_id' => $categoryId,
                'title' => $this->faker->sentence(mt_rand(2,8)),
                'body' => collect($this->faker->paragraphs(mt_rand(3,7)))->map(fn($p) => "<p>$p</p>")->implode(""),
                'image' => $categoryImageMap[$categoryId], 
        ];
    }
}
