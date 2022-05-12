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
Route::post('/wali', 'App\Http\Controllers\Api\WaliController@store');
Route::get('/wali', 'App\Http\Controllers\Api\WaliController@index');
Route::put('/wali', 'App\Http\Controllers\Api\WaliController@update');
Route::delete('/wali', 'App\Http\Controllers\Api\WaliController@destroy');
Route::view('/wali', 'App\Http\Controllers\Api\WaliController@joinTable');

Route::post('/siswa', 'App\Http\Controllers\Api\SiswaController@store');
Route::get('/siswa', 'App\Http\Controllers\Api\SiswaController@index');
Route::put('/siswa', 'App\Http\Controllers\Api\SiswaController@update');
Route::delete('/siswa', 'App\Http\Controllers\Api\SiswaController@destroy');
