<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Animals;
use App\Models\Articles;
use App\Models\Comments;
use App\Models\Reminders;
use App\Models\Categories;
use App\Models\Forum_posts;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Doctor_profil;
use App\Models\Health_records;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Seeder untuk peran dokter
        $this->createUsers('dokter', 'dokter', 10);

        // Seeder untuk peran admin
        $this->createUsers('admin', 'admin', 5);

        // Seeder untuk peran pemilik hewan
        $this->createUsers('pemilik hewan', 'pemilikhewan', 5);


        \App\Models\User::factory()->create([
            'name' => 'fikri',
            'email' => 'fikri@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
            'role' => 'admin',
        ]);

        Categories::create([
            'name' => 'Anjing'
        ]);

        Categories::create([
            'name' => 'Kucing'
        ]);

        Categories::create([
            'name' => 'Burung'
        ]);

        Categories::create([
            'name' => 'Hewan Ternak'
        ]);

        Categories::create([
            'name' => 'Kelinci'
        ]);

        Articles::factory(15)->create();
        Forum_posts::factory(10)->create();
        Comments::factory(20)->create();
        Doctor_profil::factory(10)->create();
        Animals::factory(6)->create();
        Health_records::factory(6)->create();
        Reminders::factory(6)->create();
    }

    private function createUsers($roleName, $roleSlug, $count)
    {
        $faker = Faker::create();
        for ($i = 1; $i <= $count; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => fake()->userName . '@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => $roleSlug,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info("{$count} users with role '{$roleName}' seeded successfully.");
    }
}
