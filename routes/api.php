<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::post('/save-data', "App\Http\Controllers\DataController@saveApiDataToDatabase");
Route::get('/get-data', "App\Http\Controllers\DataController@getData");

Route::get('/get-api-data', 'App\Http\Controllers\DataController@getApiData');
