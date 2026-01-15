<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Author;
use App\Models\Audience;
use App\Models\Article;

class CommentController extends Controller
{
    public function store()
    {
        Comment::create([
            'name' => 'Thank you to all the subscribers',
            'commentable_id' => Article::where('name','Climate changes in the last 3 years')->first()->id,
            'commentable_type' => Article::class,
            'user_id' => Author::where('name','Sok')->first()->user_id
        ]);

        Comment::create([
            'name' => 'Your article is amazing',
            'commentable_id' => Author::where('name','Sao')->first()->id,
            'commentable_type' => Author::class,
            'user_id' => Audience::where('name','Samnang')->first()->user_id
        ]);

        Comment::create([
            'name' => 'Welcome to read my article',
            'commentable_id' => Audience::where('name','Samnang')->first()->id,
            'commentable_type' => Audience::class,
            'user_id' => Author::where('name','Sao')->first()->user_id
        ]);

        Comment::create([
            'name' => "I can't wait this thing happening",
            'commentable_id' => Article::where('name','Quantum computers, is it coming?')->first()->id,
            'commentable_type' => Article::class,
            'user_id' => Audience::where('name','Veasna')->first()->user_id
        ]);

        return response()->json(['message' => 'Comments created']);
    }
}
