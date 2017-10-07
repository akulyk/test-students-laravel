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




Auth::routes();


//Доступно для авторизированных
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@isNew');
    Route::get('/new', 'HomeController@isNew');
    Route::get('/profile/{id}', 'StudentsController@view')->name('profile');
    Route::post('/update/{id}', 'StudentsController@store')->name('update');
    Route::get('/', 'HomeController@index')->name('search');
});

