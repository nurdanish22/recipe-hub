<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Engagement;
use App\Models\Recipe;

class EngagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = Recipe::all();

        foreach ($recipes as $recipe) {
            Engagement::updateOrCreate(
                ['recipe_id' => $recipe->id],
                [
                    'views_count' => rand(10, 500),
                    'likes_count' => rand(1, 100),
                    'bookmarks_count' => rand(0, 50),
                    'comments_count' => $recipe->comments()->count(),
                ]
            );
        }
    }
}
