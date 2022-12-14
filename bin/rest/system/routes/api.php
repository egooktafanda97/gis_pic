<?php

use App\Http\Controllers\AuthController;
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

// AUTH =============================================================
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'main',

], function ($router) {
    Route::get('/main-data/{slug?}', [
        \App\Http\Controllers\MasterData::class, "data_main"
    ]);
    Route::get('/geojson/{slug?}', [
        \App\Http\Controllers\MasterData::class, "geojson"
    ]);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'industri',

], function ($router) {
    Route::get('/dataIndustri', [
        \App\Http\Controllers\MasterData::class, "getdataIndustri",
    ]);
});
