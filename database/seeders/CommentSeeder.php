<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $recipes = Recipe::all();

        // For each recipe, create 2 comments from random users
        foreach ($recipes as $recipe) {
            for ($i = 0; $i < 2; $i++) {
                $user = $users->random();
                Comment::create([
                    'user_id' => $user->id,
                    'recipe_id' => $recipe->id,
                    'comment_text' => fake()->sentence(12),
                    'rating' => rand(3, 5),
                ]);
            }
        }
    }
}
