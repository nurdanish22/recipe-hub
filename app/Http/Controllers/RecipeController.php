<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Engagement;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::latest()->with('user')->get();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([    
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string',
            'cooking_time' => 'required|integer',
            'preparation_time' => 'required|integer',
            'difficulty_level' => 'required|string',
            'servings' => 'required|integer',
            'image_url' => 'required|string', // or 'image' if you're uploading files
        ]);

        $validated['user_id'] = auth()->id(); // Attach current user

        Recipe::create($validated);
        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully.');
    }

    /**
     * Display the specified resource.
     */
        public function show($id)
    {
        $recipe = Recipe::with(['user', 'ingredients', 'steps', 'comments'])->findOrFail($id);

        // Increment view count
        $engagement = Engagement::firstOrCreate(['recipe_id' => $id]);
        $engagement->increment('views_count');

        // Can also update likes, bookmarks, and comments counts elsewhere, not necessarily here

        return view('recipes.show', compact('recipe', 'engagement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        
        // Optional: make sure only the owner can edit
        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required|string',
            'cooking_time' => 'required|integer',
            'preparation_time' => 'required|integer',
            'difficulty_level' => 'required|string',
            'servings' => 'required|integer',
            'image_url' => 'required|string',
        ]);

        $recipe->update($validated);
        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Recipe updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);

        if ($recipe->user_id !== auth()->id()) {
            abort(403);
        }

        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted.');
    }
}
