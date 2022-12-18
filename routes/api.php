<?php

use Illuminate\Http\Request;
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

Route::post('register', [ \App\Http\Controllers\Api\PassportAuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\PassportAuthController::class, 'login']);
Route::post('logout', [\App\Http\Controllers\Api\PassportAuthController::class, 'logout']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::middleware('auth:api')->group(function () {
    Route::get('users', function (){
        return response(\App\Models\User::all());
    });

//    Категории
    Route::get('category', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('category/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'show']);
    Route::post('category', [\App\Http\Controllers\Api\CategoryController::class, 'store']);
    Route::put('category/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'update']);
    Route::delete('category/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'destroy']);

//    Задачи
    Route::get('search/task/{task}', [\App\Http\Controllers\Api\TaskController::class, 'search']);

    Route::get('task', [\App\Http\Controllers\Api\TaskController::class, 'allTask']);
    Route::get('{id_category}/task', [\App\Http\Controllers\Api\TaskController::class, 'index']);
    Route::get('{id_category}/task/{id}', [\App\Http\Controllers\Api\TaskController::class, 'show']);
    Route::post('{id_category}/task', [\App\Http\Controllers\Api\TaskController::class, 'store']);
    Route::put('{id_category}/task/{id}', [\App\Http\Controllers\Api\TaskController::class, 'update']);
    Route::delete('{id_category}/task/{id}', [\App\Http\Controllers\Api\TaskController::class, 'destroy']);

    Route::delete('task/{id}', [\App\Http\Controllers\Api\TaskController::class, 'destroyTask']);

//    Поиск категории по названию
    Route::get('search/category/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'search']);



});
