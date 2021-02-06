<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagTaskController;
use App\Http\Controllers\UserTaskController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/v1/users', UserController::class);

Route::resource('/v1/tasks', TaskController::class);

Route::resource('/v1/tags', TagController::class);

Route::resource('/v1/projects', ProjectController::class);

Route::get('/v1/tag-task', [TagTaskController::class, 'index']);

Route::get('/v1/user-task', [UserTaskController::class, 'index']);

