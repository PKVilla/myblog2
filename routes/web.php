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
    return view('pages.landing');
});

 // Route::middleware(['admin'])->group(function(){

 	route::get('/allpost', 'Postcontroller@allPost');
 	route::post('/addpost', 'Postcontroller@savePost');
 	route::get('/addpost/add', 'Postcontroller@showAddPost');
 	route::get('/editpost/{id}/edit', 'Postcontroller@showEditPostForm');
 	route::put('/editpost/{id}/edit', 'Postcontroller@editForm');
 	route::delete('/deletepost/{id}/delete', 'Postcontroller@deletePost');

// });

route::middleware(['auth'])->group(function(){

	route::get('/welcome', 'Postcontroller@showPosts');
	route::get('/perblog/{id}', 'Postcontroller@showPerBlogPost');
	Route::post('/comment/store', 'CommentController@store')->name('comment.add');
	Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

});




Route::post('/like', 'PostController@LikePost')->name('like');

route::get('/landing', 'NavController@goToLanding');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/redirect/facebook', 'FacebookController@redirect');

// Route::get('/callback/facebook', 'FacebookController@callback');


// Route::get('/redirect/google', 'GoogleController@redirect');

// Route::get('/callback', 'GoogleController@callback');
