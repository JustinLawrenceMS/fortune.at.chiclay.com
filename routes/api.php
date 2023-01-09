<?php

use App\Http\Controllers\SoothController;
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

Route::get('sooth/v1/fortune', [SoothController::class, 'getSooth']);

Route::get('sooth/v1/all', [SoothController::class, 'getAllSooths']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
