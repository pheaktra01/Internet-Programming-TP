<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    protected $fillable = ['name', 'user_id'];

    // an author have one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // an author has many articles
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    // an author has many comments through articles(polymorphic via articles)
    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(
            Comment::class, 
            Article::class,
            'id',
            'id'
        )->where('commentable_type', Article::class);
    }

    // an author has many audiences (has many through)
    public function audiences(): HasManyThrough
    {
        return $this->hasManyThrough(
            Audience::class,
            Article::class,
            'author_id', // Foreign key on articles table
            'article_id', // Foreign key on audiences table
            'id', // Local key on authors table
            'id'  // Local key on articles table

        );
    }

}