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
                'title' => 'Nasi Lemak',
                'description' => 'A Malaysian traditional dish that is famous for Malaysians to take for breakfast. Sometimes lunch or dinner',
                'category' => 'Rice',
                'cooking_time' => 40,
                'preparation_time' => 20,
                'difficulty_level' => 'Moderate',
                'servings' => 2,
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Nasi_Lemak_dengan_Chili_Nasi_Lemak_dan_Sotong_Pedas%2C_di_Penang_Summer_Restaurant.jpg/960px-Nasi_Lemak_dengan_Chili_Nasi_Lemak_dan_Sotong_Pedas%2C_di_Penang_Summer_Restaurant.jpg',
                'ingredients' => [
                    ['name' => 'Cups coconut milk', 'quantity' => '240', 'unit' => 'g'],
                    ['name' => 'Water', 'quantity' => '240', 'unit' => 'g'],
                    ['name' => 'Grain Rice', 'quantity' => '2', 'unit' => 'cups'],
                    ['name' => 'Ginger', 'quantity' => '1(½)', 'unit' => 'inch'],
                    ['name' => 'Ground Ginger', 'quantity' => '1/4', 'unit' => 'teaspoon'],
                    ['name' => 'Bay Leaf', 'quantity' => '1', 'unit' => 'whole'],
                    ['name' => 'Salt', 'quantity' => 'to taste', 'unit' => ''],
                    ['name' => 'Oil', 'quantity' => '1', 'unit' => 'cup'],
                    ['name' => 'Raw Peanuts', 'quantity' => '1', 'unit' => 'cup'],
                    ['name' => 'Anchovies', 'quantity' => '4', 'unit' => 'ounces'],
                    ['name' => 'Hard-Boiled Eggs', 'quantity' => '4', 'unit' => ''],
                    ['name' => 'Cucumber', 'quantity' => '1', 'unit' => 'medium'],
                    ['name' => 'Vegetable Oil', 'quantity' => '2', 'unit' => 'tablespoon'],
                    ['name' => 'Onion', 'quantity' => '1', 'unit' => 'medium'],
                    ['name' => 'Shallots', 'quantity' => '3', 'unit' => 'cloves'],
                    ['name' => 'Chili Paste', 'quantity' => '2', 'unit' => 'teaspoon'],
                    ['name' => 'Water', 'quantity' => 'optional', 'unit' => 'cups'],
                    ['name' => 'White Anchovies', 'quantity' => '4', 'unit' => 'ounces'],
                    ['name' => 'Tamarind Juice', 'quantity' => '1/4', 'unit' => 'cup'],
                    ['name' => 'White Sugar', 'quantity' => '3', 'unit' => 'tablespoons'],
                    ['name' => 'Salt', 'quantity' => 'to taste', 'unit' => ''],
                ],

                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Make the rice: Stir coconut milk, water, rice, fresh ginger, ground ginger, bay leaf, and salt together in a medium saucepan.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Cover and bring to a boil over medium heat. Reduce the heat and simmer until tender, 20 to 30 minutes. Discard bay leaf and keep rice warm until garnish and sauce are ready.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'While the rice is cooking, make the garnish: Heat 1 cup vegetable oil in a large skillet over medium-high heat. Stir in peanuts and cook briefly, until lightly browned. Remove peanuts with a slotted spoon and place onto paper towels to soak up excess grease.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Return the skillet to the stove. Stir in anchovies and cook, turning occasionally, until crisp, 2 to 3 minutes. Remove with a slotted spoon and place on paper towels. Discard oil and wipe out the skillet.', 'image_url' => ''],
                    ['step_number' => 5, 'instruction' => 'Make the sauce: Heat oil in a clean skillet. Stir in onion, shallots, and garlic; cook until fragrant, 1 to 2 minutes.', 'image_url' => ''],
                    ['step_number' => 6, 'instruction' => 'Mix in chilli paste and cook for 10 minutes, stirring occasionally; if mixture is too dry, add water as needed.', 'image_url' => ''],
                    ['step_number' => 7, 'instruction' => 'Stir in anchovies and cook for 5 minutes. Stir in tamarind juice, sugar, and salt; simmer until sauce is thick, about 5 minutes.', 'image_url' => ''],
                    ['step_number' => 8, 'instruction' => 'Ladle warm rice into bowls. Top with warm sauce, then top with peanuts, fried anchovies, hard-boiled eggs, and cucumber.', 'image_url' => ''],

                ],
                'tags' => ['halal', 'nut-free'],
            ],
            [
                'title' => 'Indian Butter Chicken',
                'description' => 'One of the authentic Indian dish that is well-known around the world.',
                'category' => 'Chicken',
                'cooking_time' => 120,
                'preparation_time' => 60,
                'difficulty_level' => 'Moderate',
                'servings' => 4,
                'image_url' => 'https://thekitchenpaper.com/wp-content/uploads/2018/01/indian-butter-chicken-recipe-1.jpg',
                'ingredients' => [
                    ['name' => 'Whole-Milk Yogurt', 'quantity' => '200', 'unit' => 'g'],
                    ['name' => 'Garlic', 'quantity' => '8', 'unit' => 'cloves'],
                    ['name' => 'Lemon Juice', 'quantity' => '1/2', 'unit' => 'squeeze'],
                    ['name' => 'Garam Masala', 'quantity' => 'to taste', 'unit' => ''],
                    ['name' => 'Ginger', 'quantity' => '1(½)', 'unit' => 'inch'],
   	                ['name' => 'Kashmiri Chili Powder', 'quantity' => '1', 'unit' => 'cup'],
                    ['name' => 'Chicken Thighs', 'quantity' => '8', 'unit' => 'pcs'],
                    ['name' => 'Makhani Sauce', 'quantity' => '2', 'unit' => 'cups'],
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Start the marinade off by whisking together yogurt, garlic, lemon juice, garam masala, ginger, salt, and Kashmiri chili powder. Wash and pat dry the chicken thighs and then toss them in the yogurt mixture to coat completely. Cover the bowl and place it into the refrigerator to marinate for 1 hour.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Heat your broiler and prepare a large baking sheet by lining it with foil, then spread the marinated chicken evenly across the sheet in a single layer. Broil the chicken, paying close attention that it doesn’t burn, for about 15 minutes until it is charred and cooked through. Set aside to cool slightly.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Then begin the makhani sauce by melting butter in a large skillet. Add in the tomato paste and cook for about 5 minutes until darkened to a deep brick red. This helps bring out more tomato flavor and aroma. Once the tomato paste has darkened, add in the serrano and ginger and continue to cook for about 1 minute more until fragrant and the tomato paste begins to stick to the pan.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Add in the spices and cook, stirring frequently until fragrant. After 30 seconds, add in the cream, fenugreek, salt, chicken, and water and stir to combine. Allow the mixture to come up to a simmer, then reduce the heat and cook, stirring occasionally, for about 10 to 15 minutes until the sauce has thickened and has begun to separate from the fat.', 'image_url' => ''],
	                ['step_number' => 5, 'instruction' => 'Taste the mixture and adjust seasoning if needed, then top with cilantro and serve over rice.', 'image_url' => ''],
                ],
                'tags' => ['halal', 'nut-free', 'spicy'],
            ],
            [
                'title' => 'Japanese Chicken Curry',
                'description' => 'A go to dish that simple and warm for those who wants a comfort food for their dinner.',
                'category' => 'Curry',
                'cooking_time' => 30,
                'preparation_time' => 10,
                'difficulty_level' => 'Easy',
                'servings' => 1,
                'image_url' => 'https://japan.recipetineats.com/wp-content/uploads/2021/12/Katsu_Curry_7011bsq.jpg',
                'ingredients' => [
                    ['name' => 'House Vermont Curry', 'quantity' => '2', 'unit' => 'cubes'],
                    ['name' => 'Cooked Rice', 'quantity' => '1', 'unit' => 'serving'],
                    ['name' => 'Onion', 'quantity' => '1/2', 'unit' => 'pcs'],
                    ['name' => 'Potato', 'quantity' => '½, cut into cubes', 'unit' => 'cubes'],
                    ['name' => 'Carrot', 'quantity' => '1', 'unit' => 'medium'],
	                ['name' => 'Chicken Cutlet', 'quantity' => '1', 'unit' => 'inch, wide strips'],
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Put oil into a pot and sauté onion pieces until the edges start browning.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Add potato and carrot pieces to the pot and stir.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Add water and bring it to a boil. Remove scum as it rises.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Add curry roux and cook.', 'image_url' =>''],
                    ['step_number' => 5, 'instruction' => 'Cook chicken cutlets and slice them.', 'image_url' => ''],
                    ['step_number' => 6, 'instruction' => 'Put cooked rice on one side of a serving plate, place cutlet pieces next to the rice.', 'image_url' => ''],
                    ['step_number' => 7, 'instruction' => 'Pour curry on the side next to the cutlet away from the rice.', 'image_url' => ''],
                    ['step_number' => 8, 'instruction' => 'Place a small amount of fukujinzuke on the plate.', 'image_url' => ''],
                ],
                'tags' => ['halal', 'nut-free', 'spicy'],
            ],
            [
                'title' => 'Jalapeno Popper Dip',
                'description' => 'Delicious appetiser or snack for a party gathering .',
                'category' => 'Appetiser',
                'cooking_time' => 15,
                'preparation_time' => 5,
                'difficulty_level' => 'Easy',
                'servings' => 6,
                'image_url' => 'https://cdn.loveandlemons.com/wp-content/uploads/2022/10/jalapeno-popper-dip.jpg',
                'ingredients' => [
                    ['name' => 'Jalapenos', 'quantity' => '', 'unit' => ''],
                    ['name' => 'Garlic and Onion Powder', 'quantity' => '1/2', 'unit' => 'teaspoon, depends on your jalapenos'],
                    ['name' => 'Smoked Paprika and Garlic', 'quantity' => '', 'unit' => ''],
                    ['name' => 'Sharp Cheddar Cheese', 'quantity' => '', 'unit' => ''],
                    ['name' => 'Panko Bread Crumbs', 'quantity' => '', 'unit' => ''],
	                ['name' => 'Chives', 'quantity' => '', 'unit' => ''],
	                ['name' => 'Sea Salt', 'quantity' => 'for a taste', 'unit' => ''],
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Roasting the peppers and garlic. Roasting the peppers mellows their spicy flavor and softens them so that they meld into the creamy dip. I like to do this under the broiler. In my oven, it takes just 10 to 15 minutes! The garlic roasts right alongside it.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Mixing up the dip. Place the chopped roasted peppers and garlic in a medium bowl with the yogurt, spices, and salt. Stir to combine.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Add water and bring it to a boil. Remove scum as it rises.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Adding the topping and broiling the dip. Quickly prep the panko by tossing it with a little olive oil.', 'image_url' =>''],
                    ['step_number' => 5, 'instruction' => 'Spread the yogurt mixture in a small skillet or baking dish, and top it with the cheese. Sprinkle the panko on top of the dip and broil until it’s golden brown.', 'image_url' => ''],
                ],
                'tags' => ['halal', 'nut-free', 'spicy', 'quick', 'dessert'],
            ],
            [
                'title' => 'Classic Brownie',
                'description' => 'A classic easy bake dessert that everyone loves. Full with chocolaty flavor',
                'category' => 'Baked Cake',
                'cooking_time' => 45,
                'preparation_time' => 15,
                'difficulty_level' => 'Moderate',
                'servings' => 5,
                'image_url' => 'https://www.thechunkychef.com/wp-content/uploads/2021/02/Classic-Fudgy-Brownies-1200.jpg',
                'ingredients' => [
                    ['name' => 'Unsalted Butter', 'quantity' => '125', 'unit' => 'g'],
                    ['name' => 'Cadbury Baking Dark Chocolate', 'quantity' => '125', 'unit' => 'g'],
                    ['name' => 'Eggs', 'quantity' => '3', 'unit' => ''],
                    ['name' => 'White Sugar', 'quantity' => '335', 'unit' => 'g'],
                    ['name' => 'Plain Flour', 'quantity' => '115', 'unit' => 'g'],
	                ['name' => 'Dutch Cocoa Powder', 'quantity' => '30', 'unit' => 'g'],
	                ['name' => 'Vanilla Extract', 'quantity' => '1', 'unit' => 'teaspoon'],
                    ['name' => 'Salt', 'quantity' => 'for a taste', 'unit' => ''],
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Preheat the oven to 180C/160C fan force. Grease a 20cm (base measurement) square cake pan and line with baking paper.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Place butter and chocolate in a heatproof bowl over a saucepan of simmering water (do not let the bowl touch the water). Stir with a metal spoon until melted. Remove from heat. Quickly stir in egg, sugar, flour, cocoa powder, vanilla and salt until just combined. Pour into the prepared pan. .', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Bake for 30 minutes or until a skewer inserted in the centre comes out with moist crumbs clinging. Set aside to cool completely.', 'image_url' => ''],
                ],
                'tags' => ['halal', 'nut-free', 'dessert'],
            ],
            [
                'title' => 'Carrot Cake',
                'description' => 'A dessert for anyone does not like sweet cakes',
                'category' => 'Cakes',
                'cooking_time' => 90,
                'preparation_time' => 20,
                'difficulty_level' => 'Moderate',
                'servings' => 5,
                'image_url' => 'https://static01.nyt.com/images/2020/11/01/dining/Carrot-Cake-textless/Carrot-Cake-textless-videoSixteenByNineJumbo1600.jpg',
                'ingredients' => [
                    ['name' => 'Olive oil', 'quantity' => 'To grease', 'unit' => ''],
                    ['name' => 'Self-Raising Flour', 'quantity' => '150', 'unit' => 'g'],
                    ['name' => 'Plain Flour', 'quantity' => '75', 'unit' => 'g'],
                    ['name' => 'Coles Bicarbonate Soda', 'quantity' => '1', 'unit' => 'teaspoon'],
                    ['name' => 'Coles Cinnamon Ground', 'quantity' => '1/2', 'unit' => 'teaspoon'],
	                ['name' => 'Brown Sugar', 'quantity' => '80', 'unit' => 'g'],
	                ['name' => 'Olive Oil', 'quantity' => '185', 'unit' => 'ml'],
 	                ['name' => 'Golden Syrup', 'quantity' => '125', 'unit' => 'ml'],
                    ['name' => 'Eggs', 'quantity' => '3', 'unit' => ''],
                    ['name' => 'Vanilla Essence', 'quantity' => '1', 'unit' => 'teaspoon'],
                    ['name' => 'Carrots, Grated and peeled', 'quantity' => '300', 'unit' => 'g'],
                    ['name' => 'Cream Cheese', 'quantity' => '250', 'unit' => 'g'],
                    ['name' => 'Pure Icing Sugar', 'quantity' => '80', 'unit' => 'g'],
                    ['name' => 'Vanilla Essence', 'quantity' => '1/2', 'unit' => 'teaspoon'],
                ],
                'steps' => [
                    ['step_number' => 1, 'instruction' => 'Preheat the oven to 170C or 150C fan-forced. Grease a 20cm (base) round cake pan lightly with oil, and line with non-stick baking paper.', 'image_url' => ''],
                    ['step_number' => 2, 'instruction' => 'Sift the self-raising and plain flour, bicarbonate of soda and cinnamon into a large bowl.', 'image_url' => ''],
                    ['step_number' => 3, 'instruction' => 'Put the brown sugar, oil, golden syrup, eggs and vanilla in a separate bowl. Use a balloon whisk to mix until combined.', 'image_url' => ''],
                    ['step_number' => 4, 'instruction' => 'Pour the oil mixture into the dry ingredients. Use a wooden spoon to stir gently until just combined. Stir in the grated carrot.', 'image_url' => ''],
                    ['step_number' => 5, 'instruction' => 'Pour the mixture into the pan and bake for 1 hour. Set aside for 5 minutes, before turning out onto a wire rack to cool completely.', 'image_url' => ''],
                    ['step_number' => 6, 'instruction' => 'To make the icing, place the cream cheese, icing sugar and vanilla in a bowl. Use a wooden spoon to mix until well combined..', 'image_url' => ''],
                    ['step_number' => 7, 'instruction' => 'Spread the icing over the cake.', 'image_url' => ''],
                ],
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
