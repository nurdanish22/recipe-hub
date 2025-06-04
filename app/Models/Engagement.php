<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipe_id',
        'views_count',
        'likes_count',
        'bookmarks_count',
        'comments_count'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function recipe()
{
    return $this->belongsTo(Recipe::class);
}

}
