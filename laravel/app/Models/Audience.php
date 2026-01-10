<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Audience extends Model
{
    protected $fillable = [
        'name',
        'article_id',
        'user_id',
    ];

    // audience belongs to an article
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    // audience has one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // An audience has many comments (polymorphic)
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
