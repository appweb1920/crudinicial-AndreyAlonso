<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Routes of Collector
Route::get('/collectors', 'App\Http\Controllers\CollectorController@show');
Route::post('/addCollector', 'App\Http\Controllers\CollectorController@create');
Route::get('/deleteCollector/{id}', 'App\Http\Controllers\CollectorController@delete');
Route::get('/selectCollector/{id}', 'App\Http\Controllers\CollectorController@select');
Route::post('/updateCollector', 'App\Http\Controllers\CollectorController@update');

// Routes of Recycling Point
Route::get('/recyclingPoints', 'App\Http\Controllers\RecyClingPointController@show');
Route::post('/addRecyclingPoint', 'App\Http\Controllers\RecyClingPointController@create');
Route::get('/deleteRecyclingPoint/{id}', 'App\Http\Controllers\RecyClingPointController@delete');
Route::get('/selectRecyclingPoint/{id}', 'App\Http\Controllers\RecyClingPointController@select');
Route::post('/updateRecyclingPoint', 'App\Http\Controllers\RecyClingPointController@update');

// Routes of Collector Details
Route::get('/collectorDetails', 'App\Http\Controllers\CollectorDetailController@show');
Route::post('/addCollectorDetail', 'App\Http\Controllers\CollectorDetailController@create');
Route::get('/deleteCollectorDetail/{id}', 'App\Http\Controllers\CollectorDetailController@delete');
//Route::get('/selectRecyclingPoint/{id}', 'App\Http\Controllers\RecyClingPointController@select');
//Route::post('/updateRecyclingPoint', 'App\Http\Controllers\RecyClingPointController@update');

Auth::routes();
