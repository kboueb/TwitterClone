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

Route::get('/', 'TweetController@index')->middleware('auth');

Route::resource('tweet', 'TweetController')->middleware('auth');

Route::post('/comment/{tweet}', 'CommentController@store')->name('comment.store');
Route::post('/comment-reply/{comment}', 'CommentController@storeReply')->name('comment.storeReply');

Route::get('tweet-personnel', 'ProfileController@tweet_perso')->middleware('auth');
