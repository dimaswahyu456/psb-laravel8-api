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
Route::apiResource('/siswa', App\Http\Controllers\Api\SiswaController::class);
Route::get('/wali', 'App\Http\Controllers\Api\waliController@index');
Route::post('/wali', 'App\Http\Controllers\Api\waliController@store');
Route::put('/wali', 'App\Http\Controllers\Api\waliController@update');
Route::delete('/wali', 'App\Http\Controllers\Api\waliController@destroy');

Route::delete('/siswa', 'App\Http\Controllers\Api\siswaController@destroy');
Route::delete('/siswa', 'App\Http\Controllers\Api\siswaController@destroy');
Route::delete('/siswa', 'App\Http\Controllers\Api\siswaController@destroy');
Route::delete('/siswa', 'App\Http\Controllers\Api\siswaController@destroy');
