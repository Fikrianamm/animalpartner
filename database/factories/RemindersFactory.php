<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reminders>
 */
class RemindersFactory extends Factory
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
        static $id = 16;
        static $animal = 1;

        return [
            'user_id' => $id++,
            'animal_id' => $animal++,
            'reminder_type' => $types[$type],
            'description' => $this->faker->sentence,
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
            'is_completed' => false,
        ];
    }
}
