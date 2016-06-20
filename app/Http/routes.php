<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::get('startpage', function () {
     return view('layouts.master');
 });

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login','AuthController@getLogin');
Route::get('register','AuthController@getRegister');
Route::post('post-register','UserController@postRegister');
Route::post('post-login','AuthController@postLogin');
Route::get('logout','AuthController@postLogout');
Route::post('search','SearchController@getResults');
Route::any('dashboard',[
    'uses'   => 'PostController@postStatus',
    'as'     => 'dashboard',
    'middleware' => ['auth'],
]);

Route::post('/post/article',[
    'uses'   => 'PostController@postArticle',
    'as'     => '/post/article',
    'middleware' => ['auth'],
]);
Route::get('/delete/article/{id}',[
    'uses'   => 'PostController@deleteArticle',
    'as'     => '/delete/article',
    'middleware' => ['auth'],
]);
Route::post('/post/comment',[
    'uses'   => 'PostController@postComment',
    'as'     => '/post/comment',
    'middleware' => ['auth'],
]);
Route::get('/user/{id}',[
    'uses'   => 'ProfileController@getProfile',
    'as'     => 'profile.index',
    'middleware' => ['auth'],
]);
Route::get('/friends/{id}',[
    'uses'   => 'FriendController@getIndex',
    'as'     => 'friends.index',
    'middleware' => ['auth'],
]);

Route::get('/friends/add/{id}',[
    'uses'   => 'FriendController@getAdd',
    'as'     => 'friends.add',
    'middleware' => ['auth'],
]);

Route::get('/friends/accept/{id}',[
    'uses'   => 'FriendController@getAccept',
    'as'     => 'friends.accept',
    'middleware' => ['auth'],
]);

Route::get('/friends/delete/{id}',[
    'uses'   => 'FriendController@postDelete',
    'as'     => 'friends.delete',
    'middleware' => ['auth'],
]);
Route::post('/status/like',[
    'uses'   => 'PostController@postLike',
    'as'     => '/status/like',
    'middleware' => ['auth'],
]);

Route::post('/comment/like',[
    'uses'   => 'PostController@postLikeComment',
    'as'     => '/comment/like',
    'middleware' => ['auth'],
]);

Route::post('/change-password',[
    'uses'   => 'UserController@changePassword',
    'as'     => '/change-password',
    'middleware' => ['auth'],
]);

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});
Route::post('sendmessage', 'chatController@sendMessage');




