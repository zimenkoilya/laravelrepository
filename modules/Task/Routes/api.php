<?php

use Illuminate\Http\Request;
use Modules\Task\Http\Controllers\TaskController;

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

Route::group([
    'prefix' => 'tasks',
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('/', [TaskController::class, 'list'])->name('list');
    Route::post('/', [TaskController::class, 'create'])->name('create');
    Route::get('/templates', [TaskController::class, 'templates'])->name('templates');
    Route::get('/{id}', [TaskController::class, 'read'])->name('read');
    Route::put('/{id}', [TaskController::class, 'update'])->name('update');
    Route::delete('/{id}', [TaskController::class, 'delete'])->name('delete');
    Route::post('complete/{id}', [TaskController::class, 'complete'])->name('complete');
});