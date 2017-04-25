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
Route:: post('/reply_post', 'PostController@reply_post_page');
//Direct user to check all post 
Route::get('/check_post', 'PostController@check_post_page');
Route::get('/check_post_page', 'PostController@check_post_page');
//academic
Route::get('/check_post_a', 'PostController@check_post_a_page');
Route::get('/check_post_a_page', 'PostController@check_post_a_page');
Route::get('/check_post_f', 'PostController@check_post_f_page');
Route::get('/check_post_f_page', 'PostController@check_post_f_page');
//User login
// Route::post('/user_login', 'UserController@login');
//Route::post('/user_register', 'RegisterController@create');

//Edit user information
Route::get('/editUserInfo', 'UserController@get_user_info');
Route::post('/editUserInfo', 'UserController@update_user_info');
//email



//Search bar
Route::post('/search','PostController@search');

//Chat 
Route::get('/chatRooms','ChatController@check_chat_page');
Route::get('/chat/{roomname}/{username}', 'ChatController@enter_room');
Route::post('/chat/{roomname}/sendMessage','ChatController@sendMessage');
Route::post('/chat/{roomname}/isTyping', 'ChatController@isTyping');
Route::post('/chat/{roomname}/notTyping', 'ChatController@notTyping');
Route::post('/chat/{roomname}/retrieveChatMessages', 'ChatController@retrieveChatMessages');
Route::post('/chat/{roomname}/retrieveTypingStatus', 'ChatController@retrieveTypingStatus');
Route::post('create_chat_room','ChatController@createNewRoom');
Route::post('delete_room','ChatController@delete_room');
Route::post('edit_chat_room','ChatController@edit_room');


Auth::routes();
