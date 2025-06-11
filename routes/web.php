<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Updated dashboard route to use the new dashboard method in RecipeController
Route::get('/dashboard', [\App\Http\Controllers\RecipeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class); // User management routes
    Route::resource('recipes', RecipeController::class); // Recipe management routes

    // Ingredient routes nested under recipes
    Route::get('recipes/{recipe}/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
    Route::get('recipes/{recipe}/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
    Route::post('recipes/{recipe}/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');

    // Ingredient resource routes for show, edit, update, destroy
    Route::get('ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');
    Route::get('ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
    Route::put('ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');
    Route::delete('ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');

    // Step routes nested under recipes
    Route::get('recipes/{recipe}/steps', [StepController::class, 'index'])->name('steps.index');
    Route::get('recipes/{recipe}/steps/create', [StepController::class, 'create'])->name('steps.create');
    Route::post('recipes/{recipe}/steps', [StepController::class, 'store'])->name('steps.store');

    // Step resource routes for show, edit, update, destroy
    Route::get('steps/{step}', [StepController::class, 'show'])->name('steps.show');
    Route::get('steps/{step}/edit', [StepController::class, 'edit'])->name('steps.edit');
    Route::put('steps/{step}', [StepController::class, 'update'])->name('steps.update');
    Route::delete('steps/{step}', [StepController::class, 'destroy'])->name('steps.destroy');

    // Comment routes nested under recipes
    Route::get('recipes/{recipe}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('recipes/{recipe}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Comment resource routes for show, edit, update, destroy
    Route::get('comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Bookmark routes nested under recipes
    Route::post('recipes/{recipe}/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('recipes/{recipe}/bookmarks', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');

    // Bookmark resource routes for show (if needed)
    Route::get('bookmarks/{bookmark}', [BookmarkController::class, 'show'])->name('bookmarks.show');

    // Bookmarks index (list all bookmarks for the logged-in user)
    Route::get('bookmarks', [\App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmarks.index');

    // Engagement routes nested under recipes (for viewing or updating engagement stats)
    Route::get('recipes/{recipe}/engagement', [EngagementController::class, 'show'])->name('engagements.show');
    Route::post('recipes/{recipe}/engagement', [EngagementController::class, 'store'])->name('engagements.store');
    Route::put('recipes/{recipe}/engagement', [EngagementController::class, 'update'])->name('engagements.update');

    // Tag resource routes
    Route::resource('tags', TagController::class);
    // Custom route to show all recipes for a tag
    Route::get('tags/{id}/recipes', [TagController::class, 'recipes'])->name('tags.recipes');

    // Recipe search route
    // Route::get('recipes/search', [\App\Http\Controllers\RecipeController::class, 'search'])->name('recipes.search');
});

require __DIR__.'/auth.php';