<?php

use App\Interface\laravel\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/product', [ProductController::class, 'save']);
Route::get('/product', [ProductController::class, 'getAll']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);
Route::put('/product/{id}', [ProductController::class, 'update']);
