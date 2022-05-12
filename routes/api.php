<?php

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

Route::get('/Wali', 'App\Http\Controllers\Api\WaliController@index');
Route::post('/Wali', 'App\Http\Controllers\Api\WaliController@store');
Route::put('/Wali', 'App\Http\Controllers\Api\WaliController@update');
Route::delete('/Wali', 'App\Http\Controllers\Api\WaliController@destroy');

Route::apiResource('/siswa', App\Http\Controllers\Api\SiswaController::class);
Route::get('/siswa', 'App\Http\Controllers\Api\SiswaController@index');
Route::post('/siswa', 'App\Http\Controllers\Api\SiswaController@store');
Route::put('/siswa', 'App\Http\Controllers\Api\SiswaController@update');
Route::delete('/siswa', 'App\Http\Controllers\Api\SiswaController@destroy');
