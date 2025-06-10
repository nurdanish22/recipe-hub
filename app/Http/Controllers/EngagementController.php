<?php

namespace App\Http\Controllers;

use App\Models\Engagement;
use Illuminate\Http\Request;

class EngagementController extends Controller
{
    // Requires a different approach as Engagement is not a resource like others

    public function updateViews($recipe_id) // Called when a recipe is viewed
{
    $engagement = Engagement::firstOrCreate(['recipe_id' => $recipe_id]);
    $engagement->increment('views_count');
}

public function incrementLikes($recipe_id) // Called when a recipe is liked
{
    $engagement = Engagement::firstOrCreate(['recipe_id' => $recipe_id]);
    $engagement->increment('likes_count');
}

public function decrementLikes($recipe_id) // Called when a recipe like is removed
{
    $engagement = Engagement::firstOrCreate(['recipe_id' => $recipe_id]);
    $engagement->decrement('likes_count');
}

public function updateBookmarksCount($recipe_id, $increment = true) // Called when a recipe is bookmarked or unbookmarked
{
    $engagement = Engagement::firstOrCreate(['recipe_id' => $recipe_id]);
    $increment ? $engagement->increment('bookmarks_count')
               : $engagement->decrement('bookmarks_count');
}

public function updateCommentsCount($recipe_id, $increment = true) // Called when a comment is added or removed
{
    $engagement = Engagement::firstOrCreate(['recipe_id' => $recipe_id]);
    $increment ? $engagement->increment('comments_count')
               : $engagement->decrement('comments_count');
}

public function show($recipe_id) // Display the engagement metrics for a specific recipe (optional as it shows in a dashboard)
{
    $engagement = Engagement::where('recipe_id', $recipe_id)->first();
    return view('engagements.show', compact('engagement'));
}

}
