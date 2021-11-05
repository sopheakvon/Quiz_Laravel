<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Book 
Route::get('/book',[BookController::class, 'index']);
Route::post('/book',[BookController::class, 'store']);
Route::get('/book/{id}',[BookController::class, 'show']);
Route::put('/book/{id}',[BookController::class, 'update']);
Route::delete('/book/{id}',[BookController::class, 'destroy']);

// Author 
Route::get('/author',[AuthorController::class, 'index']);
Route::post('/author',[AuthorController::class, 'store']);
Route::get('/author/{id}',[AuthorController::class, 'show']);
Route::put('/author/{id}',[AuthorController::class, 'update']);
Route::delete('/author/{id}',[AuthorController::class, 'destroy']);