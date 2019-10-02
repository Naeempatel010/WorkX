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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//USER-REVIEW relationship
Route::get('/reviewHome', 'ReviewController@reviewHome');

Route::get('/review', 'ReviewController@review');

Route::post('/postReview', 'ReviewController@postReview');

Route::get('/upvoteReview/{id}', 'ReviewController@upvoteReview');

Route::get('/downvoteReview/{id}', 'ReviewController@downvoteReview');




//USER-CREATOR relationship
Route::get('/ideaHome', 'CreatorController@ideaHome');

Route::get('/idea', 'CreatorController@idea');

Route::post('/postIdea', 'CreatorController@postIdea');