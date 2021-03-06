<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/solar-dashboard', 'App\Http\Controllers\HomeController@showDashboard');
Route::get('/more-data', 'App\Http\Controllers\HomeController@showMoreData');
Route::get('/upload-data', 'App\Http\Controllers\DataController@create');
Route::post('/upload-data', 'App\Http\Controllers\DataController@store');
Route::get('/compare-with-us', 'App\Http\Controllers\HomeController@compareWithUs');
Route::post('/compare-with-us', 'App\Http\Controllers\HomeController@saveSolarData');
