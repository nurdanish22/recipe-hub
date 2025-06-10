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
                'tags' => ['halal', 'nut-free'], // assign tags by name
            ],
            // Add more recipes here as needed, each with a 'tags' => [...] array
            [
                'title' => 'Beef Lasagna',
                'description' => 'A classic Italian-American baked pasta dish with layers of rich meat sauce, creamy béchamel, and melted cheese, offering a hearty and comforting meal.',
                'category' => 'Main Dish',
                'cooking_time' => 45,
                'preparation_time' => 30,
                'difficulty_level' => 'Medium',
                'servings' => 6,
                'image_url' => 'https://cdn11.bigcommerce.com/s-62pzyeauu6/images/stencil/1280x1280/products/605/1314/Raw_website_images_14__84298.1737367525.png?c=1',
                'ingredients' => [
                    ['name' => 'Lasagna Noodles (no-boil or regular)', 'quantity' => '12', 'unit' => 'sheets'],
                    ['name' => 'Ground Beef (lean)', 'quantity' => '500', 'unit' => 'g'],
                    ['name' => 'Crushed Tomatoes', 'quantity' => '800', 'unit' => 'g can'],
                    ['name' => 'Tomato Paste', 'quantity' => '2', 'unit' => 'tbsp'],
                    ['name' => 'Onion (chopped)', 'quantity' => '1', 'unit' => 'medium'],
                    ['name' => 'Garlic (minced)', 'quantity' => '3', 'unit' => 'cloves'],
                    ['name' => 'Olive Oil', 'quantity' => '1', 'unit' => 'tbsp'],
                    ['name' => 'Dried Oregano', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'Dried Basil', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'Salt', 'quantity' => 'to taste', 'unit' => ''],
                    ['name' => 'Black Pepper', 'quantity' => 'to taste', 'unit' => ''],
                    ['name' => 'Ricotta Cheese', 'quantity' => '250', 'unit' => 'g'],
                    ['name' => 'Parmesan Cheese (grated)', 'quantity' => '100', 'unit' => 'g'],
                    ['name' => 'Mozzarella Cheese (shredded)', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Milk (for béchamel)', 'quantity' => '500', 'unit' => 'ml'],
                    ['name' => 'Butter (for béchamel)', 'quantity' => '50', 'unit' => 'g'],
                    ['name' => 'All-purpose Flour (for béchamel)', 'quantity' => '50', 'unit' => 'g']
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Prepare the Meat Sauce: In a large pot, heat olive oil over medium heat. Sauté chopped onion until softened, then add minced garlic and cook for 1 minute until fragrant. Add ground beef and cook until browned, breaking it up. Drain excess fat. Stir in tomato paste, crushed tomatoes, oregano, basil, salt, and pepper. Simmer for at least 20 minutes (longer for richer flavor).', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Prepare the Béchamel Sauce: In a separate saucepan, melt butter over medium heat. Whisk in flour and cook for 1-2 minutes to form a roux. Gradually whisk in milk until smooth and thickened. Season with a pinch of salt and pepper.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Assemble the Lasagna: Preheat oven to 190°C (375°F). Spread a thin layer of meat sauce at the bottom of a 9x13 inch baking dish. Arrange a layer of lasagna noodles over the sauce. Spread ricotta cheese evenly, then drizzle with béchamel sauce, and sprinkle with mozzarella and Parmesan. Repeat layers, ending with noodles, meat sauce, béchamel, and a generous top layer of mozzarella and Parmesan.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Bake: Cover the dish loosely with foil and bake for 25 minutes. Remove the foil and bake for another 20-25 minutes, or until the cheese is bubbly and golden brown. Let it rest for 10-15 minutes before serving to allow the layers to set.', 'image_url' => '']
                ],
                'tags' => ['halal', 'nut-free', 'spicy'],
            ],
            [
                'title' => 'Chicken Dumplings',
                'description' => 'Delicious homemade dumplings with a savory chicken and vegetable filling, perfect steamed or pan-fried until golden and tender.',
                'category' => 'Main Dish',
                'cooking_time' => 20,
                'preparation_time' => 30,
                'difficulty_level' => 'Medium',
                'servings' => 4,
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzGu0IxcimGquexBtTulKg_8zuUzMbnZ861A&s',
                'ingredients' => [
                    ['name' => 'Ground Chicken', 'quantity' => '500', 'unit' => 'g'],
                    ['name' => 'Dumpling Wrappers', 'quantity' => '50', 'unit' => 'pcs'],
                    ['name' => 'Napa Cabbage (finely chopped)', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Green Onions (chopped)', 'quantity' => '2', 'unit' => 'stalks'],
                    ['name' => 'Fresh Ginger (grated)', 'quantity' => '1', 'unit' => 'tbsp'],
                    ['name' => 'Soy Sauce', 'quantity' => '2', 'unit' => 'tbsp'],
                    ['name' => 'Sesame Oil', 'quantity' => '1', 'unit' => 'tbsp'],
                    ['name' => 'Salt', 'quantity' => '0.5', 'unit' => 'tsp'],
                    ['name' => 'Black Pepper', 'quantity' => '0.25', 'unit' => 'tsp'],
                    ['name' => 'Water (for sealing)', 'quantity' => 'as needed', 'unit' => '']
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Prepare the Filling: In a large bowl, combine ground chicken, finely chopped napa cabbage, green onions, grated ginger, soy sauce, sesame oil, salt, and black pepper. Mix thoroughly until all ingredients are well combined.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Assemble Dumplings: Take one dumpling wrapper. Place a spoonful of the chicken filling in the center. Lightly moisten the edges of the wrapper with water. Fold the wrapper in half to create a half-moon shape, then pleat the edges to seal. Repeat with remaining wrappers and filling.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Cook the Dumplings (Steaming or Pan-Frying): For Steaming: Arrange dumplings in a steamer basket lined with parchment paper, ensuring they don\'t touch. Steam over boiling water for 10-12 minutes until cooked through. For Pan-Frying: Heat a little oil in a non-stick skillet over medium-high heat. Place dumplings in the skillet in a single layer and cook until bottoms are golden brown (2-3 minutes). Add about 1/2 cup of water to the pan, cover, and steam for 5-7 minutes until water evaporates and dumplings are cooked. Uncover and cook for another 1-2 minutes until bottoms are crisp.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Serve immediately with your favorite dipping sauce (e.g., soy sauce with vinegar and chili oil).', 'image_url' => '']
            ],
                'tags' => ['halal', 'spicy'],
            ],
            [
                'title' => 'Chocolate Chip Cookies',
                'description' => 'The quintessential American dessert: perfectly soft, chewy, and loaded with melty chocolate chips, a timeless treat for any sweet craving.',
                'category' => 'Dessert',
                'cooking_time' => 10,
                'preparation_time' => 15,
                'difficulty_level' => 'Easy',
                'servings' => 24,
                'image_url' => 'https://crisco.com/wp-content/uploads/2024/08/ultimate-chocolate-chip-cookies.png',
                'ingredients' => [
                    ['name' => 'Unsalted Butter (softened)', 'quantity' => '1', 'unit' => 'cup (226g)'],
                    ['name' => 'Granulated Sugar', 'quantity' => '0.75', 'unit' => 'cup'],
                    ['name' => 'Packed Light Brown Sugar', 'quantity' => '0.75', 'unit' => 'cup'],
                    ['name' => 'Large Eggs', 'quantity' => '2', 'unit' => 'pcs'],
                    ['name' => 'Vanilla Extract', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'All-purpose Flour', 'quantity' => '2.25', 'unit' => 'cups'],
                    ['name' => 'Baking Soda', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'Salt', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'Semi-sweet Chocolate Chips', 'quantity' => '2', 'unit' => 'cups']
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Cream Wet Ingredients: In a large bowl, cream together the softened butter, granulated sugar, and brown sugar with an electric mixer until light and fluffy. Beat in the eggs one at a time, then stir in the vanilla extract until well combined.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Combine Dry Ingredients: In a separate medium bowl, whisk together the flour, baking soda, and salt. Gradually add the dry ingredients to the wet ingredients, mixing on low speed until just combined. Do not overmix.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Add Chocolate Chips & Form Cookies: Fold in the chocolate chips using a spatula. Drop rounded tablespoons of dough onto ungreased baking sheets, spacing them about 2 inches apart.', 'image_url' => ''],
                ['step_number' => 4, 'instruction' => 'Bake: Bake in a preheated oven at 175°C (350°F) for 9-11 minutes, or until the edges are golden brown and the centers are still slightly soft. Let cookies cool on the baking sheet for a few minutes before transferring them to a wire rack to cool completely.', 'image_url' => '']
            ],
                'tags' => ['dessert', 'nut-free'],
            ],
            [
                'title' => 'Sate Ayam (Chicken Satay)',
                'description' => 'Tender pieces of chicken marinated in aromatic spices, skewered, and grilled to perfection, then served with a rich and creamy peanut sauce. A quintessential Indonesian delight.',
                'category' => 'Main Dish',
                'cooking_time' => 15,
                'preparation_time' => 30,
                'difficulty_level' => 'Easy',
                'servings' => 4,
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7h1b_Gtbs_8BxAG5NsCn23Q-xdlSJgO1Qtw&s',
                'ingredients' => [
                    ['name' => 'Chicken Thighs (boneless, skinless, cut into 1-inch cubes)', 'quantity' => '500', 'unit' => 'g'],
                    ['name' => 'Sweet Soy Sauce (Kecap Manis)', 'quantity' => '3', 'unit' => 'tbsp'],
                    ['name' => 'Ground Turmeric', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'Ground Cumin', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'Ground Coriander', 'quantity' => '1', 'unit' => 'tsp'],
                    ['name' => 'Garlic (minced)', 'quantity' => '2', 'unit' => 'cloves'],
                    ['name' => 'Lime Juice', 'quantity' => '1', 'unit' => 'tbsp'],
                    ['name' => 'Wooden Skewers (soaked in water for 30 mins)', 'quantity' => '12-15', 'unit' => 'pcs'],
                    ['name' => 'Peanut Sauce (store-bought or homemade)', 'quantity' => '1', 'unit' => 'cup'],
                    ['name' => 'Cucumber (sliced, for garnish)', 'quantity' => '0.5', 'unit' => ''],
                    ['name' => 'Red Onion (sliced, for garnish)', 'quantity' => '0.25', 'unit' => '']
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Marinate the Chicken: In a bowl, combine chicken cubes with 2 tbsp of Kecap Manis, ground turmeric, cumin, coriander, minced garlic, and lime juice. Mix well to ensure all chicken pieces are coated. Cover and marinate in the refrigerator for at least 30 minutes, or up to 2 hours for deeper flavor.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Skewer the Chicken: Thread the marinated chicken pieces onto the soaked wooden skewers, typically 3-4 pieces per skewer. Try to keep them somewhat flat so they cook evenly.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Grill the Satay: Preheat your grill (charcoal, gas, or grill pan) to medium-high heat. Brush the grill grates lightly with oil. Place the chicken skewers on the hot grill. Grill for 3-5 minutes per side, brushing occasionally with the remaining 1 tbsp of Kecap Manis (or a mixture of Kecap Manis and a little oil), until the chicken is cooked through and has nice char marks.', 'image_url' => ''],
                ['step_number' => 4, 'instruction' => 'Serve: Arrange the grilled chicken satay on a serving platter. Serve immediately with a generous amount of warm peanut sauce, and garnish with slices of fresh cucumber and red onion.', 'image_url' => '']
            ],
                'tags' => ['halal', 'spicy', 'nut-free'],
            ],
            // Add more recipes as needed

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

            // Attach tags by name if provided, else random
            if (isset($data['tags']) && is_array($data['tags'])) {
                $tagIds = \App\Models\Tag::whereIn('name', $data['tags'])->pluck('id');
                $recipe->tags()->attach($tagIds);
            } else {
                $tagIds = \App\Models\Tag::inRandomOrder()->limit(rand(1, 3))->pluck('id');
                $recipe->tags()->attach($tagIds);
            }
        }
    }
}
