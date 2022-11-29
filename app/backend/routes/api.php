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
    Route::get('/dataKecamatan/{slug?}', [
        \App\Http\Controllers\MasterData::class, "dataKecamatan"
    ]);
    Route::get('/ImportDataJson', [
        \App\Http\Controllers\MasterData::class, "ImportDataJson"
    ]);
    Route::get('/getDataMaster', [
        \App\Http\Controllers\MasterData::class, "getDataMaster"
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


Route::group([
    'middleware' => 'api',
    'prefix' => 'geojson',

], function ($router) {
    Route::get('/pku', [
        \App\Http\Controllers\GeoJsonController::class, "pekanbaru",
    ]);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'polygon',

], function ($router) {
    Route::get('/pku', [
        \App\Http\Controllers\PolygonController::class, "GeoJson",
    ]);
    Route::get('/getByKode', [
        \App\Http\Controllers\PolygonController::class, "getDataKecmatanByKode",
    ]);
});


// Sqlite
Route::group([
    'middleware' => 'api',
    'prefix' => 'sqlite',

], function ($router) {
    Route::get('/', [
        \App\Http\Controllers\CoreInfoGrafisController::class, "get",
    ]);
    Route::get('/createInfoCore', [
        \App\Http\Controllers\CoreInfoGrafisController::class, "created",
    ]);
});
