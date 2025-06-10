<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'vegan',
            'vegetarian',
            'halal',
            'non-halal',
            'kosher',
            'gluten-free',
            'dairy-free',
            'nut-free',
            'spicy',
            'quick',
            'dessert',
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(['name' => $tag]);
        }
    }
}
