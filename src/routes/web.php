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
Route::get('/',        'PagesController@main');
Route::get('/members', 'MembersController@members');
Route::get('avatar/{image}', function($image=null){
    $path = storage_path().'/avatar/'.$image;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

Route::post('/', 'PagesController@main');
Route::post('/save',   'MembersController@saveData');
Route::post('/save2',  'MembersController@saveData2');
Route::post('/upload', 'MembersController@uploadPhoto');
Route::post('/visible','MembersController@setVisibility');
Route::post('/valid',  'MembersController@isValid');

Auth::routes();
Route::get('/home', 'HomeController@index');