<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategories;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $newsCategories = NewsCategories::all();

        for ($i = 1; $i < 100; $i++) {
            $user = $users->random();
            $newsCategory = $newsCategories->random();

            News::factory()->create([
                'user_id' => $user->id,
                'news_categories_id' => $newsCategory->id,
            ]);
        }
    }
}
