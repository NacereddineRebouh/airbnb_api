<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
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

//Public routes
Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::get('test', [AuthController::class,'test']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(RoomController::class)->group(function () {
    Route::get('rooms/list', 'list');
    Route::get('rooms/getRoom/{id}', 'getRoom');
    Route::get('rooms/search/{location}', 'searchWithLocation');
    // Route::get('Products/search/{searchValue}', 'search');
});
