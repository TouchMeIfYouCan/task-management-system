<?php

use App\Http\Controllers\Api\Users\UserApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User routes
Route::get('task-list', [UserApiController::class, 'userTaskList']);
Route::post('add-task', [UserApiController::class, 'addTask']);
Route::put('update-task/{id}', [UserApiController::class, 'updateTask']);
Route::delete('delete-task/{id}', [UserApiController::class, 'deleteTask']);
