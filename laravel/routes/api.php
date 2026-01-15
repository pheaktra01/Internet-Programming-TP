<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QueryController;

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
        'name' => $user->name,
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


Route::post('/authors', [AuthorController::class, 'store']);
Route::post('/articles', [ArticleController::class, 'store']);
Route::post('/audiences', [AudienceController::class, 'store']);
Route::post('/subscribe', [AudienceController::class, 'subscribe']);
Route::post('/comments', [CommentController::class, 'store']);

Route::get('/query/author-sao-articles', [QueryController::class, 'authorSaoArticles']);
Route::get('/query/article-audiences', [QueryController::class, 'articleAudiences']);
Route::get('/query/author-sok-audiences', [QueryController::class, 'authorSokAudiences']);
Route::get('/query/samnang-comments', [QueryController::class, 'samnangComments']);
Route::get('/query/comments-with-topic', [QueryController::class, 'commentsWithTopic']);