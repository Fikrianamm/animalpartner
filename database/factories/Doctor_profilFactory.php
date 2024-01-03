<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor_profil>
 */
class Doctor_profilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specialistId = mt_rand(0, 4);
        $specialists = [
            'Anjing & Kucing',
            'Hewan Ternak',
            'Kelinci',
            'Burung',
            'Reptil',
        ];

        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
            'specialist' => $specialists[$specialistId],
            'bio' => collect($this->faker->paragraphs(mt_rand(2,4)))->map(fn($p) => "<p>$p</p>")->implode(""),
        ];
    }
}
