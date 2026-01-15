<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;
use App\Models\Article;
use App\Models\Audience;
use App\Models\Comment;

class QueryController extends Controller
{
    // Get all articles of author Sao
    public function authorSaoArticles()
    {
        return Author::where('name','Sao')->first()->articles;
    }

    // Get all audiences of article "Climate changes in the last 3 years"
    public function articleAudiences()
    {
        return Article::where('name','Climate changes in the last 3 years')
            ->first()->audiences;
    }

    // Get all audiences of author Sok (HasManyThrough)
    public function authorSokAudiences()
    {
        return Author::where('name','Sok')->first()->audiences;
    }

    // Get all comments of audience Samnang
    public function samnangComments()
    {
        return Audience::where('name','Samnang')->first()->comments;
    }

    // Get all comments with their topic
    public function commentsWithTopic()
    {
        return Comment::with('commentable')->get();
    }
}
