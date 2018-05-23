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
    return view('main');
});

Route::any('/test', function () {
    return view('testView');
});

Route::post('/api/send', [
    'as' => 'fsgsdfdsfsad',
    'uses' => 'ApisController@send'
]);

Route::get('lists/projects/{userId}', 'ListsController@project');
Route::get('lists/categories/{projectId}/{userId}', 'ListsController@category');
Route::get('lists/apis/{categoryId}/{userId}','ListsController@api');
Route::get('lists/params/{apiId}/{userId}','ListsController@param');
Route::get('lists/members/{projectId}/{userId}','ListsController@member');

Route::get('lists/{userId}', 'ListsController@index');


Route::any('405', function () {
    return view('405');
});

