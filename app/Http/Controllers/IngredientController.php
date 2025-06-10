<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($recipe_id) //optional to show ingredients for a specific recipe in one page
        {
            $recipe = Recipe::findOrFail($recipe_id);
            $ingredients = $recipe->ingredients;

            return view('ingredients.index', compact('recipe', 'ingredients'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create($recipe_id)
        {
            $recipe = Recipe::findOrFail($recipe_id);
            return view('ingredients.create', compact('recipe'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $recipe_id)
        {
            $recipe = Recipe::findOrFail($recipe_id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'quantity' => 'required|string',
                'unit' => 'required|string',
            ]);

            $recipe->ingredients()->create($validated);

            return redirect()->route('recipes.show', $recipe_id)->with('success', 'Ingredient added.');
        }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
        {
            $ingredient = Ingredient::findOrFail($id);
            return view('ingredients.edit', compact('ingredient'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
        {
            $ingredient = Ingredient::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'quantity' => 'required|string',
                'unit' => 'required|string',
            ]);

            $ingredient->update($validated);

            return redirect()->route('recipes.show', $ingredient->recipe_id)->with('success', 'Ingredient updated.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
        {
            $ingredient = Ingredient::findOrFail($id);
            $recipeId = $ingredient->recipe_id;
            $ingredient->delete();

            return redirect()->route('recipes.show', $recipeId)->with('success', 'Ingredient deleted.');
        }
}
