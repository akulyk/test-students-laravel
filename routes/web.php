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
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/register', 'Auth\RegisterController@index')->name('register');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::get('/home', 'StudentsController@index')->name('home');
Route::get('/register', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/students', 'StudentsController@index')->name('home');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Доступно для авторизированных
Route::group(['middleware' => 'auth'], function () {


    Route::get('/profile/{id}', 'StudentsController@view')->name('profile');
    Route::post('/update/{id}', 'StudentsController@store')->name('update');
});

