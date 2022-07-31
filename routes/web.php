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
Route::group(['middleware' => ['auth']], function () {


    Route::get('/home', 'Student\StudentController@index')->name('home');

  
});

Route::get('/', 'GlobalController@login_page')->name('login_page');

Route::post('/students/logout', 'Student\StudentAuthController@student_logout')->name('student_logout');
Auth::routes();
 