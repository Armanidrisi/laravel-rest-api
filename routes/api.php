<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
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


Route::get('/blogpost', [BlogPostController::class, 'getAll']);
Route::get('/blogpost/{id}', [BlogPostController::class, 'getOne']);
Route::post('/blogpost', [BlogPostController::class, 'insertData']);
Route::delete('blogpost/{id}', [BlogPostController::class, 'deleteData']);
Route::put('blogpost/{id}', [BlogPostController::class, 'updateData']);