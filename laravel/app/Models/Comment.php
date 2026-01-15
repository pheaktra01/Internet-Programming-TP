<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'commentable_id',
        'commentable_type',
        'user_id',
    ];

    // Polymorphic owner (article or audience)
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    // A user wrote many comments
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
