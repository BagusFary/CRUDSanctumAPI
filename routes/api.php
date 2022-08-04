<?php

use App\Http\Controllers\SanctumAuthController;
use App\Http\Controllers\SanctumPostController;
use App\Http\Controllers\SanctumUserController;
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
// Public routes
Route::post('/register', [SanctumAuthController::class, 'register']);
Route::post('/login', [SanctumAuthController::class, 'login']);


Route::get('/users', [SanctumUserController::class, 'index']);
Route::get('/users/{id}', [SanctumUserController::class, 'show']);
Route::get('/users/search/{name}', [SanctumUserController::class, 'search']);

Route::get('/posts', [SanctumPostController::class, 'index']);
Route::get('/posts/{id}', [SanctumPostController::class, 'show']);
Route::get('/posts/search/{judul}', [SanctumPostController::class, 'search']);


// Protected routes
Route::post('/logout', [SanctumAuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/users', [SanctumUserController::class, 'store'])->middleware('auth:sanctum');
Route::put('/users/{id}', [SanctumUserController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/users/{id}', [SanctumUserController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/posts', [SanctumPostController::class, 'store'])->middleware('auth:sanctum');
Route::put('/posts/{id}', [SanctumPostController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/posts/{id}', [SanctumPostController::class, 'destroy'])->middleware('auth:sanctum');



