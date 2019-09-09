<?php

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

Route::get('/test', HomeController::class);
Route::get('/event/trigger', 'EventController@trigger');
Route::get('/pusher/trigger', 'PusherController@trigger');
Route::get('/subscription/trigger', 'SubscriptionController@trigger');

Route::get('schema', '\Agontuk\Schema\Controllers\SchemaController@index');
Route::post('schema', '\Agontuk\Schema\Controllers\SchemaController@generateMigration');
