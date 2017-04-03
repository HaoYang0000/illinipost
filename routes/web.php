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

//Direct to the default page
Route::get('/', function () {
    return view('index');
});
//Direct user to home
Route::get('/home', function () {
    return view('post.home_page');
});

//Direct user to create a post 
Route::get('/create_post', 'PostController@create_post_page');
Route::post('/create_post', 'PostController@create_post');
Route::post('/delete_post', 'PostController@delete_post_page');
//Direct user to check all post 
Route::get('/check_post', 'PostController@check_post_page');

//User login
// Route::post('/user_login', 'UserController@login');
// Route::post('/user_register', 'UserController@register');

//Edit user information
Route::get('/editUserInfo', 'UserController@get_user_info');
Route::post('/editUserInfo', 'UserController@update_user_info');

//Crawler test
Route::get('/crawlertest',  function () {
    return view('test.craawler');
});


Auth::routes();
