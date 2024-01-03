<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Health_records>
 */
class Health_recordsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $type = mt_rand(0,5);
        $types = [
            'Perawatan Umum',
            'Vaksin',
            'Pemeriksaan Rutin',
            'Mandi',
            'Obat',
            'Grooming',
        ];

        return [
            'animal_id' => $this->faker->unique()->randomElement([1, 2, 3, 4, 5, 6]),
            'record_type' => $types[$type],
            'description' => $this->faker->sentence,
            'date' => $this->faker->date,
        ];
    }
}
