<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // User views their bookmarks
        {
            $bookmarks = Bookmark::with('recipe')
                                ->where('user_id', auth()->id())
                                ->get();

            return view('bookmarks.index', compact('bookmarks'));
        }

    /**
     * Show the form for creating a new resource.
     */
/*     public function create()
    {
        return view('bookmarks.create');
    } */

    /**
     * Store a newly created resource in storage.
     */
    public function store($recipe_id) // User bookmarks a recipe
        {
            $user = auth()->user();

            // Avoid duplicate bookmarks
            $exists = Bookmark::where('user_id', $user->id)
                            ->where('recipe_id', $recipe_id)
                            ->exists();

            if (!$exists) {
                Bookmark::create([
                    'user_id' => $user->id,
                    'recipe_id' => $recipe_id,
                ]);
            }

            return redirect()->back()->with('success', 'Recipe bookmarked!');
        }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
/*     public function edit($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        return view('bookmarks.edit', compact('bookmark'));
    } */

    /**
     * Update the specified resource in storage.
     */
/*     public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $bookmark = Bookmark::findOrFail($id);
        $bookmark->update($validated);

        return redirect()->route('bookmarks.index')->with('success', 'Bookmark updated successfully!');
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($recipe_id) // User removes a bookmark
        {
            $user = auth()->user();

            Bookmark::where('user_id', $user->id)
                    ->where('recipe_id', $recipe_id)
                    ->delete();

            return redirect()->back()->with('success', 'Bookmark removed!');
        }
}
