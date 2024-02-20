<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\blogController;
use App\Http\Controllers\Api\categoryController;
use App\Http\Controllers\Api\commentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/users', UserController::class);
    // Route::apiResource('/posts', UserController::class);
});
Route::apiResource('/comments', commentController::class);
Route::apiResource('/blog', blogController::class);
// Route::get('/blog/index', [blogController::class, 'index']);
Route::post('/categories/store', [categoryController::class, 'store']);

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
