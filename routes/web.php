<?php

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//ログアウト中のページ
//ログイン画面に遷移
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
//ユーザー登録画面に遷移
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
//登録完了画面に遷移
Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
//トップページ表示
Route::get('/top', 'PostsController@index');
//投稿新規登録
Route::post('/create', 'PostsController@create');
//投稿更新
Route::post('/post/update', 'Postscontroller@update');
//投稿削除
Route::get('/post/{id}/delete', 'Postscontroller@delete');
//フォローする、フォロー外す
Route::post('/followCreate', 'FollowsController@followCreate');
Route::post('/followRemove', 'FollowsController@followRemove');
//フォローリスト、フォロワーリスト画面遷移
Route::get('/followList', 'FollowsController@FollowList');
Route::get('/followerList', 'FollowsController@FollowerList');
//自分のプロフィール編集
Route::get('/profileForm', 'PostsController@profileForm');
Route::post('/profileUpdate', 'PostsController@profileUpdate');
//他人のプロフィール画面遷移
Route::get('/{id}/otherProfile', 'UsersController@otherProfile');
//ユーザー検索
Route::get('/userseach', 'UsersController@userseach');
//ユーザー検索画面遷移
Route::get('/search', 'UsersController@search');
//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');
