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

    Route::get('/home', 'HomeController@reviewers')->name('reviewers');
    Route::post('/logout', 'HomeAuthController@logout')->name('logout');


    /* Manage Admin */
    Route::post('/store_admin', 'HomeController@store_admin')->name('store_admin');
    Route::get('/admin_index', 'HomeController@admin_index')->name('admin_index');
    Route::delete('/delete_admin/{id}', 'HomeController@delete_admin')->name('delete_admin');
    Route::get('/edit_admin/{id}', 'HomeController@edit_admin')->name('edit_admin');
    Route::put('/update_admin/{id}', 'HomeController@update_admin')->name('update_admin');
    /* Manage Admin */


    /* Manage Student */
    Route::get('/student_index', 'HomeController@student_index')->name('student_index');
    Route::delete('/delete_student/{id}', 'HomeController@delete_student')->name('delete_student');
    /* Manage Student */

    /* Manage Videos */
    Route::get('/videos', 'HomeController@videos')->name('videos');
    /* Manage Videos */

    /* Manage Reviewers */
    Route::get('/manage_reviewers', 'HomeController@manage_reviewers')->name('manage_reviewers');
    Route::post('/store_reviewers', 'HomeController@store_reviewers')->name('store_reviewers');
    /* Manage Reviewers */
});

Route::get('/display_pdf', 'HomeController@display_pdf')->name('display_pdf');

Route::get('/view_reviewers/{id}', 'HomeController@view_reviewers')->name('view_reviewers');
Route::post('/store', 'HomeController@store_students')->name('store_students');


Route::get('/students/registration', 'GlobalController@student_registration')->name('registration');
Route::get('/', 'GlobalController@login_page')->name('login_page');
Auth::routes();
