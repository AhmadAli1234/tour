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

use Illuminate\Support\Facades\Route;

Route::prefix('admin/module/quiz')->group(function() {
    Route::get('/', 'QuizController@index')->name('quiz.admin.index');
    Route::get('/create', 'QuizController@create')->name('quiz.admin.create');
    Route::get('/edit/{id}', 'QuizController@edit')->name('quiz.admin.edit');
    Route::post('/store/{id}', 'QuizController@store')->name('quiz.admin.store');
    Route::get('/delete/{id}', 'QuizController@delete')->name('quiz.admin.delete');
    Route::get('/report', 'QuizController@report')->name('quiz.admin.report');
});
Route::prefix('admin/module/interest')->group(function() {
    Route::get('/', 'InterestController@index')->name('interest.admin.index');
    Route::get('/create', 'InterestController@create')->name('interest.admin.create');
    Route::get('/edit/{id}', 'InterestController@edit')->name('interest.admin.edit');
    Route::post('/store/{id}', 'InterestController@store')->name('interest.admin.store');
    Route::get('/delete/{id}', 'InterestController@delete')->name('interest.admin.delete');
});
Route::prefix('admin/module/advertisement')->group(function() {
    Route::get('/', 'AdvertisementController@index')->name('advertisement.admin.index');
    Route::get('/create', 'AdvertisementController@create')->name('advertisement.admin.create');
    Route::get('/edit/{id}', 'AdvertisementController@edit')->name('advertisement.admin.edit');
    Route::post('/store/{id}', 'AdvertisementController@store')->name('advertisement.admin.store');
    Route::get('/delete/{id}', 'AdvertisementController@delete')->name('advertisement.admin.delete');
});