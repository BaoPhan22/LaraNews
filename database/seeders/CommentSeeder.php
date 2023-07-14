<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $news = News::all();

        foreach ($users as $user) {
            $newsToComment = $news->random(rand(1, 3));

            foreach ($newsToComment as $item) {
                Comment::factory()->create([
                    'user_id' => $user->id,
                    'news_id' => $item->id,
                ]);
            }
        }
    }
}
