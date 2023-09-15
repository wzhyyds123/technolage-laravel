<?php

use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ResouceController;
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
Route::post('FindResouce',[ResouceController::class,'FindResouce']);
Route::post('FindNotice',[NoticeController::class,'FindNotice']);
Route::post('SearchResouce',[ResouceController::class,'SearchResouce']);

