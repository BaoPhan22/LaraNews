<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'admin',
            'image' => fake()->imageUrl(120,120),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$fKPwZgkhnVzXg57XZxKXeeahCUPk3TVYdzKccsXy5PTwq5ogYBrdq',
            'role' => 0
        ]);
        \App\Models\User::factory(100)->create();
        \App\Models\NewsCategories::factory(10)->create();

        $this->call(NewsSeeder::class);
        $this->call(CommentSeeder::class);
    }
}