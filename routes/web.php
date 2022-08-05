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


    Route::get('/students/student_login', 'Student\StudentAuthController@student_login')->name('student_login');
    Route::post('/students/logout', 'Student\StudentAuthController@student_logout')->name('student_logout');
  
});

Route::post('/students/store', 'Student\StudentController@store_students')->name('store_students');


Route::get('/students/registration', 'GlobalController@student_registration')->name('registration');
Route::get('/', 'GlobalController@login_page')->name('login_page');
Auth::routes();
 