<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'name',
        'author_id',
    ];

    // article belongs to an author
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    // article has many audiences
    public function audiences(): HasMany
    {
        return $this->hasMany(Audience::class);
    }

    // article has many comments (polymorphic)
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
