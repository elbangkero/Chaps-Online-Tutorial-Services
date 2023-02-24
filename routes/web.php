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

Route::group(['middleware' => 'AdminUser'], function () {
    Route::post('/logout', 'HomeAuthController@logout')->name('logout');

    Route::get('/dashboard', 'GlobalController@dashboard')->name('dashboard');


    /* Admin */
    Route::post('/store_admin', 'UserController@store_admin')->name('store_admin');
    Route::get('/admin_index', 'UserController@admin_index')->name('admin_index');
    Route::delete('/delete_admin/{id}', 'UserController@delete_admin')->name('delete_admin');
    Route::get('/edit_admin/{id}', 'UserController@edit_admin')->name('edit_admin');
    Route::put('/update_admin/{id}', 'UserController@update_admin')->name('update_admin');
    /* Admin */


    /* Student */
    Route::get('/student_index', 'UserController@student_index')->name('student_index');
    Route::delete('/delete_student/{id}', 'UserController@delete_student')->name('delete_student');
    Route::put('/update_student/{id}', 'UserController@update_student')->name('update_student');
    Route::get('/edit_student/{id}', 'UserController@edit_student')->name('edit_student');
    /* Student */

    /* Videos */
    Route::get('/videos', 'VideoController@videos')->name('videos');
    Route::get('/manage_videos', 'VideoController@manage_videos')->name('manage_videos');
    Route::get('/view_video/{id}', 'VideoController@view_video')->name('view_video');
    Route::post('/store_video', 'VideoController@store_video')->name('store_video');
    Route::delete('/delete_video/{id}', 'VideoController@delete_video')->name('delete_video');
    Route::get('/edit_video/{id}', 'VideoController@edit_video')->name('edit_video');
    Route::put('/update_video/{id}', 'VideoController@update_video')->name('update_video');
    /* Videos */

    /* Reviewers */
    Route::get('/reviewers', 'ReviewerController@reviewers')->name('reviewers');
    Route::get('/manage_reviewers', 'ReviewerController@manage_reviewers')->name('manage_reviewers');
    Route::post('/store_reviewers', 'ReviewerController@store_reviewers')->name('store_reviewers');
    Route::get('/edit_reviewers/{id}', 'ReviewerController@edit_reviewers')->name('edit_reviewers');
    Route::put('/update_reviewers/{id}', 'ReviewerController@update_reviewers')->name('update_reviewers');
    Route::delete('/delete_reviewers/{id}', 'ReviewerController@delete_reviewers')->name('delete_reviewers');
    Route::get('/view_reviewers/{id}', 'ReviewerController@view_reviewers')->name('view_reviewers');
    Route::get('/display_pdf', 'ReviewerController@display_pdf')->name('display_pdf');
    /* Reviewers */

    /* Services */
    Route::get('/services_index', 'ServicesController@services_index')->name('services_index');
    Route::post('/store_services', 'ServicesController@store_services')->name('store_services');
    Route::get('/edit_services/{id}', 'ServicesController@edit_services')->name('edit_services');
    Route::put('/update_services/{id}', 'ServicesController@update_services')->name('update_services');
    Route::delete('/delete_services/{id}', 'ServicesController@delete_services')->name('delete_services');
    /* Services */

    /* Folders */
    Route::get('/folders_index', 'FoldersController@folders_index')->name('folders_index');
    Route::post('/store_folders', 'FoldersController@store_folders')->name('store_folders');
    //Route::get('/edit_folders/{id}', 'FoldersController@edit_folders')->name('edit_folders');
    Route::delete('/delete_folders/{id}', 'FoldersController@delete_folders')->name('delete_folders');
    /* Folders */
});


Route::group(['middleware' => ['StudentUser', 'verified']], function () {


    /* PDF Reviewers */
    Route::get('/reviewers', 'ReviewerController@reviewers')->name('reviewers');
    Route::get('/view_reviewers/{id}', 'ReviewerController@view_reviewers')->name('view_reviewers');
    Route::get('/display_pdf', 'ReviewerController@display_pdf')->name('display_pdf');
    /* PDF Reviewers */


    /* Video Reviewers */
    Route::get('/videos', 'VideoController@videos')->name('videos');
    Route::get('/view_video/{id}', 'VideoController@view_video')->name('view_video');
    /* Videos Reviewers */
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/dashboard', 'GlobalController@dashboard')->name('dashboard');
    Route::get('/search_engine', 'GlobalController@search_engine')->name('search_engine');
});


Route::get('/dashboard/email', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify')->middleware(['signed']);
Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::post('/store', 'UserController@store_students')->name('store_students');
Route::get('/students/registration', 'GlobalController@student_registration')->name('registration');
Route::get('/', 'GlobalController@login_page')->name('login_page');

Route::post('/gcash/payment', 'ServicesController@gcash')->name('gcash');


Auth::routes();
