<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
/*     public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    } */

    /**
     * Show the form for creating a new resource.
     */
    public function create($recipe_id)
    {
        $recipe = \App\Models\Recipe::findOrFail($recipe_id);
        return view('comments.create', compact('recipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $recipe_id) //create a comment for a specific recipe
        {
            $request->validate([
                'comment_text' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
            ]);

            Comment::create([
                'recipe_id' => $recipe_id,
                'user_id' => auth()->id(), // assume user is logged in
                'comment_text' => $request->comment_text,
                'rating' => $request->rating,
            ]);

            return redirect()->route('recipes.show', $recipe_id)->with('success', 'Comment posted!');
        }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) //edit a comment, only if the user is the owner of the comment
        {
            $comment = Comment::findOrFail($id);

            if ($comment->user_id !== auth()->id()) {
                abort(403); // unauthorized
            }

            return view('comments.edit', compact('comment'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) //update a comment, only if the user is the owner of the comment
        {
            $comment = Comment::findOrFail($id);

            if ($comment->user_id !== auth()->id()) {
                abort(403);
            }

            $validated = $request->validate([
                'comment_text' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
            ]);

            $comment->update($validated);

            return redirect()->route('recipes.show', $comment->recipe_id)->with('success', 'Comment updated!');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) //delete a comment, only if the user is the owner of the comment or an admin
        {
            $comment = Comment::findOrFail($id);

            if ($comment->user_id !== auth()->id()) {
                abort(403);
            }

            $recipeId = $comment->recipe_id;
            $comment->delete();

            return redirect()->route('recipes.show', $recipeId)->with('success', 'Comment deleted!');
        }
}
