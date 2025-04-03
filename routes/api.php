<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SchoolController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
    
    Route::apiResource('schools', SchoolController::class);
    Route::apiResource('products', ProductController::class);
    Route::get('school/photo', [SchoolController::class, 'getPhoto']);
});
Route::apiResource('schools', SchoolController::class);
Route::post('schools/search', [SchoolController::class, 'search']);
Route::get('school/photo', [SchoolController::class, 'getPhoto']);
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'profile']);