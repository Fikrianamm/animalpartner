<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animals>
 */
class AnimalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $speciesrand = mt_rand(0,6);
        $species = [
            'Anjing',
            'Kucing',
            'Burung',
            'Kelinci',
            'Ayam',
            'Sapi',
            'Kuda',
        ];
        static $id = 16;

        return [
            'user_id' => $id++,
            'name' => fake()->name(),
            'species' => $species[$speciesrand],
            'age' => mt_rand(1,5),
            'image' => "https://source.unsplash.com/500x400?random",
        ];
    }
}
