<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Author;

class AuthorController extends Controller
{
    public function store()
    {
        $authors = [
            ['name' => 'Sok', 'username' => 'sok123'],
            ['name' => 'Sao', 'username' => 'sao'],
            ['name' => 'Dara', 'username' => 'd.dara'],
        ];

        foreach ($authors as $data)
        {
            $user = User::create([
                'name' => $data['username'],
                'email' => $data['username'].'@example.com',
                'password' => bcrypt('password'),
            ]);

            Author::create([
                'name' => $data['name'],
                'user_id' => $user->id,
            ]);
        }        

        return response()->json(['message' => 'Authors created successfully']);
    }

}
