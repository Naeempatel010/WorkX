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

Route::get('/home', 'HomeController@home');


Route::get('/translation', function () {
    return view('translation');
});





//USER-REVIEW relationships
Route::get('/reviewHome', 'ReviewController@reviewHome');

Route::get('/review', 'ReviewController@review');

Route::get('/reviewFormSpeak', 'ReviewController@reviewFormSpeak');

Route::get('/recordTitle', 'ReviewController@recordTitle');

Route::get('/recordDescription', 'ReviewController@recordDescription');

Route::get('/recordReview', 'ReviewController@recordReview');

Route::post('/postReview', 'ReviewController@postReview');

Route::post('/postReviewAudio', 'ReviewController@postReviewAudio');

Route::get('/upvoteReview/{id}', 'ReviewController@upvoteReview');

Route::get('/downvoteReview/{id}', 'ReviewController@downvoteReview');





//USER-CREATOR relationships
Route::get('/ideaHome', 'CreatorController@ideaHome');

Route::get('/idea', 'CreatorController@idea');

Route::post('/postIdea', 'CreatorController@postIdea');

Route::get('/downloadPoc/{name}', 'CreatorController@downloadPoc');

Route::get('/showIdeas', 'CreatorController@showIdeas');

Route::get('/showStartups', 'CreatorController@showStartups');

Route::get('/startupsDetails/{id}', 'CreatorController@startupsDetails');





//INVESTOR-IDEA-INVESTMENT relationships
Route::get('/investAmount/{id}', 'InvestorController@investAmount');

Route::post('/startInvestment', 'InvestorController@startInvestment');

Route::get('/showInvestments', 'InvestorController@showInvestments');

Route::get('/startupsInvestments/{id}', 'InvestorController@startupsInvestments');

Route::get('/investorDetails/{id}', 'InvestorController@investorDetails');





//SEEKER-APPLICATION-JOB-JOB_APPLICATION relationships
Route::get('/jobHome', 'SeekerController@jobHome');

Route::get('/profile', 'SeekerController@profile');

Route::post('/processProfile', 'SeekerController@processProfile');

Route::get('/updateProfile', 'SeekerController@updateProfile');

Route::post('/processUpdateProfileForm/{id}', 'SeekerController@processUpdateProfileForm');

Route::get('/jobApplication', 'SeekerController@jobApplication');

Route::get('/downloadResume', 'SeekerController@downloadResume');

Route::get('/downloadResume2/{name}', 'SeekerController@downloadResume2');

Route::get('/startupsJobs/{id}', 'SeekerController@startupsJobs');

Route::get('/showApplications/{id}', 'SeekerController@showApplications');

Route::get('/confirmApplication/{id}/{job_id}', 'SeekerController@confirmApplication');

Route::get('/myApplications', 'SeekerController@myApplications');





//Chat page
Route::get('/chatHome', 'HomeController@chatHome');
Route::get('user/register',['uses'=>'UserController@register','as'=>'user.register']);
Route::resource('conversation','ConversationController');
Route::resource('message','MessageController');