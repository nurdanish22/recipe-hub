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
    public function index(Request $request)
    {
        $query = Recipe::with('user');

        // Filter by tag
        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('id', $request->input('tag'));
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $recipes = $query->latest()->get();
        $tags = \App\Models\Tag::orderBy('name')->get();
        $categories = Recipe::select('category')->distinct()->pluck('category');

        return view('recipes.index', compact('recipes', 'tags', 'categories'));
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
            'image_url' => 'required|string',
        ]);
        $validated['user_id'] = auth()->id();
        $recipe = Recipe::create($validated);

        // Handle tags (comma separated)
        $tags = collect(explode(',', $request->input('tags')))
            ->map(fn($t) => trim($t))
            ->filter()->unique();
        if ($tags->count()) {
            $tagIds = \App\Models\Tag::whereIn('name', $tags)->pluck('id')->toArray();
            // Create any new tags
            $newTags = $tags->diff(\App\Models\Tag::whereIn('name', $tags)->pluck('name'));
            foreach ($newTags as $tagName) {
                $tag = \App\Models\Tag::create(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $recipe->tags()->attach($tagIds);
        }

        // Handle ingredients (one per line: quantity unit name)
        $ingredients = collect(explode("\n", $request->input('ingredients')))
            ->map(fn($line) => preg_split('/\s+/', trim($line), 3))
            ->filter(fn($arr) => count($arr) === 3);
        foreach ($ingredients as [$quantity, $unit, $name]) {
            $recipe->ingredients()->create([
                'quantity' => $quantity,
                'unit' => $unit,
                'name' => $name,
            ]);
        }

        // Handle steps (one per line: instruction)
        $steps = collect(explode("\n", $request->input('steps')))
            ->map(fn($line, $i) => ['step_number' => $i+1, 'instruction' => trim($line), 'image_url' => ''])
            ->filter(fn($step) => $step['instruction']);
        foreach ($steps as $step) {
            $recipe->steps()->create($step);
        }

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

        // Update tags
        $tags = collect(explode(',', $request->input('tags')))
            ->map(fn($t) => trim($t))
            ->filter()->unique();
        $tagIds = [];
        if ($tags->count()) {
            $tagIds = \App\Models\Tag::whereIn('name', $tags)->pluck('id')->toArray();
            $newTags = $tags->diff(\App\Models\Tag::whereIn('name', $tags)->pluck('name'));
            foreach ($newTags as $tagName) {
                $tag = \App\Models\Tag::create(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        }
        $recipe->tags()->sync($tagIds);

        // Update ingredients
        $recipe->ingredients()->delete();
        $ingredients = collect(explode("\n", $request->input('ingredients')))
            ->map(fn($line) => preg_split('/\s+/', trim($line), 3))
            ->filter(fn($arr) => count($arr) === 3);
        foreach ($ingredients as [$quantity, $unit, $name]) {
            $recipe->ingredients()->create([
                'quantity' => $quantity,
                'unit' => $unit,
                'name' => $name,
            ]);
        }

        // Update steps
        $recipe->steps()->delete();
        $steps = collect(explode("\n", $request->input('steps')))
            ->map(fn($line, $i) => ['step_number' => $i+1, 'instruction' => trim($line), 'image_url' => ''])
            ->filter(fn($step) => $step['instruction']);
        foreach ($steps as $step) {
            $recipe->steps()->create($step);
        }

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

    /**
     * Display the dashboard with latest recipes.
     */
    public function dashboard()
    {
        $recipes = Recipe::latest()->take(6)->get();
        return view('dashboard', compact('recipes'));
    }

    /**
     * Search recipes by title, description, or tag.
     */
    // public function search(Request $request)
    // {
    //     $query = $request->input('q');
    //     $recipes = \App\Models\Recipe::with('user')
    //         ->where('title', 'like', "%{$query}%")
    //         ->orWhere('description', 'like', "%{$query}%")
    //         ->orWhereHas('tags', function($q) use ($query) {
    //             $q->where('name', 'like', "%{$query}%");
    //         })
    //         ->get();
    //     return view('recipes.index', compact('recipes', 'query'));
    // }
}
