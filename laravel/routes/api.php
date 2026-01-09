<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('mobile')->accessToken;

    return response()->json([
        'token' => $token
    ]);
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Passport)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->group(function () {

    // Current user + roles
    Route::get('/me', function (Request $request) {
        return $request->user()->load('roles');
    });

    /*
    |--------------------------------------------------------------------------
    | Category Routes (Policy enforced in controller)
    |--------------------------------------------------------------------------
    */
    Route::controller(CategoryController::class)
        ->prefix('categories')
        ->group(function () {
            Route::get('/', 'getCategories');
            Route::post('/', 'createCategory');
            Route::get('/{category}', 'getCategory');
            Route::patch('/{category}/status', 'updateStatus'); // policy
            Route::delete('/{category}', 'deleteCategory');
        });

    /*
    |--------------------------------------------------------------------------
    | Product Routes (Gate enforced in controller)
    |--------------------------------------------------------------------------
    */
    Route::controller(ProductController::class)
        ->prefix('products')
        ->group(function () {
            Route::get('/', 'getProducts');
            Route::post('/', 'createProduct');   // admin/manager
            Route::get('/{product}', 'getProduct');
            Route::patch('/{product}', 'updateProduct');
            Route::delete('/{product}', 'deleteProduct');
        });
});
