<?php

// DB::listen(function($query){var_dump($query->sql, $query->bindings);});

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

Route::middleware('auth')->group(function(){
    Route::get('/posts', 'PostController@index')->name('home');
    Route::post('/posts', 'PostController@store');
    Route::delete('/posts/{post}/delete', 'PostController@destroy');

    Route::post('/posts/{post}/like', 'PostLikesController@store');
   
   

    
    Route::post('/profiles/{user:username}/follow', 
    'FollowsController@store')
    ->name('follow');

    Route::get('/profiles/{user:username}/edit',
     'ProfilesController@edit')
     ->middleware('can:edit,user');

    Route::patch('/profiles/{user:username}',
      'ProfilesController@update')
      ->middleware('can:edit,user');
    
    Route::get('/posts/{post}/edit', 'PostController@edit');
    Route::patch('/posts/{post}', 'PostController@update');  

    Route::get('/explore', 'ExploreController');
    Route::post('/posts/{id}/store', 'CommentController@store');



});
;
Route::get('/profiles/{user:username}',
 'ProfilesController@show')
 ->name('profile');

 


Auth::routes();
Route::delete('/posts/{post}/like', 'PostLikesController@destroy');


