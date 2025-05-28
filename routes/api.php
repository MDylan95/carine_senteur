<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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


Route::post('/admin/login', [AdminAuthController::class, 'login']);



Route::middleware('admin.auth')->group(function () {
    Route::get('/admin/articles', [ArticleController::class, 'index']);
    Route::post('/admin/articles', [ArticleController::class, 'store']);
});
