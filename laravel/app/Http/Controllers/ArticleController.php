<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Article;

class ArticleController extends Controller
{
    public function store()
    {
        $data = [
            'Sok' => [
                'Climate changes in the last 3 years',
                'Global warming is in its critical stage'
            ],
            'Sao' => [
                'Computers in the next generation',
                'Quantum computers, is it coming?'
            ],
            'Dara' => [
                'Chemistry in nature form',
                'The origin of water'
            ]
        ];

        foreach ($data as $authorName => $articles)
        {
            $author = Author::where('name', $authorName)->first();

            foreach ($articles as $title)
            {
                Article::create([
                    'name' => $title,
                    'author_id' => $author->id,
                ]);
            }
        }

        return response()->json(['message' => 'Articles created successfully']);
    }
}
