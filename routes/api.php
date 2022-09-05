<?php

use Asseco\Comments\App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::prefix(config('asseco-comments.routes.prefix'))
    ->middleware(config('asseco-comments.routes.middleware'))
    ->group(function () {
        Route::apiResource('comments', CommentController::class);
    });
