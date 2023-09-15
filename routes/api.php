<?php


use App\Http\Controllers\ResouceController;

use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ResouceController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\UsersController;

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
Route::post('tzlapdate',[ResouceController::class, 'tzlapdate']);
Route::post('tzldelete',[ResouceController::class,'tzldelete']);



Route::post('FindResouce',[ResouceController::class,'FindResouce']);
Route::post('FindNotice',[NoticeController::class,'FindNotice']);
Route::post('SearchResouce',[ResouceController::class,'SearchResouce']);

Route::post('register',[UsersController::class,'register']);
Route::post('login',[UsersController::class,'login']);
Route::post('adminRegister',[AdminsController::class,'adminRegister']);
Route::post('adminLogin',[AdminsController::class,'adminLogin']);

