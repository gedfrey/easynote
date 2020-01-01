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

Route::resource('posts','PostController')->middleware('auth');

Route::resource('contents','ContentController')->middleware('auth');

Route::resource('texts','TextController')->middleware('auth');

Route::resource('type-texts','TypeTextController');

Route::resource('images','ImageController');

Route::get('/post/contents/{id}','ContentsEditController@edit')
    ->name('post.contents.edit')
    ->where('id','[0-9)]+')
    ->middleware('auth');

Route::get('/post/contents/list/{id}','ContentsEditController@listById')
    ->name('post.contents.getAllByID')
    ->where('id','[0-9]+')
    ->middleware('auth');

Route::get('/post/contents/order/{id}','ContentsEditController@getOrder')
    ->name('post.contents.order')
    ->where('id','[0-9]+');

Route::post('/post/contents/up','ContentsEditController@up')
    ->name('post.contents.up')
    ->middleware('auth');

Route::post('/post/contents/down','ContentsEditController@down')
    ->name('post.contents.down')
    ->middleware('auth');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


