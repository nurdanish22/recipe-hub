<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\User;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example: Get a random user to assign as the recipe author
        $user = User::inRandomOrder()->first();

        // Example recipe data
        $recipes = [
            [
                'title' => 'Spaghetti Carbonara',
                'description' => 'A classic Italian pasta dish with eggs, cheese, pancetta, and pepper.',
                'category' => 'Pasta',
                'cooking_time' => 20,
                'preparation_time' => 10,
                'difficulty_level' => 'Easy',
                'servings' => 2,
                'image_url' => 'https://example.com/images/carbonara.jpg',
                'ingredients' => [
                    ['name' => 'Spaghetti', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Pancetta', 'quantity' => '100', 'unit' => 'g'],
                    ['name' => 'Eggs', 'quantity' => '2', 'unit' => 'pcs'],
                    ['name' => 'Parmesan Cheese', 'quantity' => '50', 'unit' => 'g'],
                    ['name' => 'Black Pepper', 'quantity' => 'to taste', 'unit' => ''],
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Boil the spaghetti in salted water.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Fry the pancetta until crisp.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Beat the eggs and mix with cheese.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Combine everything and season with pepper.', 'image_url' => ''],
                ],
            ],
            // Add more recipes here as needed
        ];

        foreach ($recipes as $data) {
            $recipe = Recipe::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'category' => $data['category'],
                'cooking_time' => $data['cooking_time'],
                'preparation_time' => $data['preparation_time'],
                'difficulty_level' => $data['difficulty_level'],
                'servings' => $data['servings'],
                'image_url' => $data['image_url'],
                'user_id' => $user ? $user->id : 1,
            ]);

            foreach ($data['ingredients'] as $ingredient) {
                $recipe->ingredients()->create($ingredient);
            }
            foreach ($data['steps'] as $step) {
                $recipe->steps()->create($step);
            }
        }
    }
}
