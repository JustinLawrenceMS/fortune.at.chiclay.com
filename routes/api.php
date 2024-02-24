<?php

use App\Http\Controllers\RampCTFController;
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

Route::get('v1/sooths/fortune', [SoothController::class, 'showSooth']);

Route::get('v1/sooths/all', [SoothController::class, 'showAllSooths']);

Route::get('v1/ctf', [RampCTFController::class, 'showCTF']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
