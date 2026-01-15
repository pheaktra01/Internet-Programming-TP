<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audience;
use App\Models\Article;

class AudienceController extends Controller
{
    public function store()
    {
        $audiences = [
            'veasna',
            'samnang',
            'ratana'
        ];

        foreach ($audiences as $name)
        {
            $user = User::create([
                'name' => $name,
                'email' => $name.'@example.com',
                'password' => bcrypt('password'),
            ]);

            Audience::create([
                'name' => ucfirst($name),
                'user_id' => $user->id,
                'article_id' => 1 // temporary
            ]);
        }        

        return response()->json(['message' => 'Audiences created successfully']);
    }

    public function subscribe()
    {
        $subscriptions = [
            'samnang' => [
                'Computers in the next generation',
                'Chemistry in nature form',
                'The origin of water'
            ],
            'veasna' => [
                'Climate changes in the last 3 years',
                'The origin of water',
                'Quantum computers, is it coming?'
            ],
            'ratana' => [
                'Climate changes in the last 3 years',
                'Global warming is in its critical stage'
            ]
        ];

        foreach ($subscriptions as $username => $articles) {
            $audience = Audience::where('name', ucfirst($username))->first();

            foreach ($articles as $title) {
                $article = Article::where('name', $title)->first();

                Audience::create([
                    'name' => $audience->name,
                    'user_id' => $audience->user_id,
                    'article_id' => $article->id
                ]);
            }
        }

        return response()->json(['message' => 'Subscribed successfully']);
    }
}
