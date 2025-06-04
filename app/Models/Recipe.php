<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function engagements()
    {
        return $this->hasMany(Engagement::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recipe_tags');
    }

}
