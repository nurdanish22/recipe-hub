<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($recipe_id) //optional, skip if steps are always shown in recipe
        {
            $recipe = Recipe::findOrFail($recipe_id);
            $steps = $recipe->steps()->orderBy('step_number')->get();

            return view('steps.index', compact('recipe', 'steps'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create($recipe_id)
        {
            $recipe = Recipe::findOrFail($recipe_id);
            return view('steps.create', compact('recipe'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $recipe_id)
        {
            $recipe = Recipe::findOrFail($recipe_id);

            $validated = $request->validate([
                'step_number' => 'required|integer|min:1',
                'instruction' => 'required|string',
                'image_url' => 'nullable|string',
            ]);

            $recipe->steps()->create($validated);

            return redirect()->route('recipes.show', $recipe_id)->with('success', 'Step added.');
        }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $step = Step::findOrFail($id);
        return view('steps.show', compact('step'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
        {
            $step = Step::findOrFail($id);
            return view('steps.edit', compact('step'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
        {
            $step = Step::findOrFail($id);

            $validated = $request->validate([
                'step_number' => 'required|integer|min:1',
                'instruction' => 'required|string',
                'image_url' => 'nullable|string',
            ]);

            $step->update($validated);

            return redirect()->route('recipes.show', $step->recipe_id)->with('success', 'Step updated.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
        {
            $step = Step::findOrFail($id);
            $recipeId = $step->recipe_id;
            $step->delete();

            return redirect()->route('recipes.show', $recipeId)->with('success', 'Step deleted.');
        }
}
