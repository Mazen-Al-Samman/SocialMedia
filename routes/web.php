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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::resource('tweets', 'TweetsController');
Route::resource('home', 'HomeController');

Route::resource('comments' , 'CommentsController') ; 

Route::resource('likes', 'LikesController');

// Route::get('likes/user/{user_id}/tweets/{tweet_id}', function ($user_id , $tweet_id) {
//     return controller('LikesController@check_like'); 
// });

Route::get('likes/user/{user_id}/tweets/{tweet_id}', ['uses' => 'LikesController@check_like']);

Route::get('color/user/{user_id}/tweets/{tweet_id}', ['uses' => 'LikesController@color']);

Route::resource('send_email', 'EmailController');