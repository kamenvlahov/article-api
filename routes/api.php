<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['throttle:100,1', 'empty-strings-to-null',]], static function () {
    Route::get('articles')
        ->name('articles.index')
        ->uses('App\Http\Controllers\ArticleApiController@index');

    Route::get('articles/search')
        ->name('articles.search')
        ->uses('App\Http\Controllers\ArticleApiController@search');

    Route::get('articles/{article}')
        ->name('articles.show')
        ->uses('App\Http\Controllers\ArticleApiController@show');

    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);

    Route::group(['middleware' => ['auth:sanctum']], static function () {
        Route::post('article')
            ->name('article.create')
            ->uses('App\Http\Controllers\ArticleApiController@store')
            ->middleware('can:create,App\Models\Article');

        Route::put('articles/{article}')
            ->name('articles.update')
            ->uses('App\Http\Controllers\ArticleApiController@update')
            ->middleware('can:update,article');

        Route::delete('articles/{article}')
            ->name('articles.delete')
            ->uses('App\Http\Controllers\ArticleApiController@destroy')
            ->middleware('can:delete,article');

        Route::post('comment/{article}')
            ->name('comment.create')
            ->uses('App\Http\Controllers\CommentController@store')
            ->middleware('can:comment,article');

        Route::put('/comments/{comment}')
            ->name('comments.update')
            ->uses('App\Http\Controllers\CommentController@update')
            ->middleware('can:update,comment');

        Route::delete('/comment/{comment}')
            ->name('comments.delete')
            ->uses('App\Http\Controllers\CommentController@destroy')
            ->middleware('can:delete,comment');

        Route::post('image/{article}')
            ->name('image.store')
            ->uses('App\Http\Controllers\ImageController@store')
            ->middleware('can:create,App\Models\Image');

        Route::delete('/images/{image}')
            ->name('image.delete')
            ->uses('App\Http\Controllers\ImageController@destroy')
            ->middleware('can:delete,image');
    });
});
