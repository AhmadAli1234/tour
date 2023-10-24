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

Route::get('/', 'HomeController@index');
Route::prefix('home')->group(function() {
    Route::get('/', 'HomeController@index');
});
Route::prefix('audioguide')->group(function() {
    Route::get('/', 'HomeController@audioguide');
});
Route::get('/ticket-new', 'HomeController@ticket');

Route::middleware(['auth'])->group(function(){
    Route::get('/user/profile-detail','HomeController@profileDetail')->name('user.profile-detail');
    Route::post('/user/profile-detail-store','HomeController@profileDetailStore')->name('user.profile-detail-store');
    Route::prefix('quiz')->group(function() {
        Route::get('/', 'HomeController@quiz');
        Route::post('/store','HomeController@storeQuiz')->name('quiz.store');
        Route::get('/ads','HomeController@ads')->name('quiz.ads');
        Route::get('/ads-result','HomeController@adsResult')->name('quiz.ads-result');
    });
});