<?php

use App\Http\Controllers\CategoryTaskController;
use App\Http\Controllers\ToDoListController;
use App\Models\CategoryTask;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('task', ToDoListController::class);
    Route::apiResource('category', CategoryTaskController::class);
});
