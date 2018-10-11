<?php

use Illuminate\Http\Request;


Route::prefix('library')->group(function () {
  Route::get('/', 'API\LibraryController@index');
  Route::get('{id}', 'API\LibraryController@show');
  Route::post('/', 'API\LibraryController@store');
  Route::put('{id}', 'API\LibraryController@update');
  Route::delete('{id}', 'API\LibraryController@delete');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
