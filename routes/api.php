<?php

use App\Http\Controllers\testcontroller;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('11', [testcontroller::class, 'text']);
Route::middleware('jwt.role:admins')->prefix('admin')->group(function () {
    Route::post('Find_Resouce', [\App\Http\Controllers\ResouceController::class, 'Find_Resouce']);//查看
    Route::post('Delete_Rsouce', [\App\Http\Controllers\ResouceController::class, 'Delete_Rsouce']);//修改
    Route::post('revise_Rsouce', [\App\Http\Controllers\ResouceController::class, 'revise_Rsouce']);
});
