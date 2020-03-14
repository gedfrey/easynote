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
})->name('welcome');

Auth::routes();

Route::get('/blog', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/approval', 'HomeController@approval')->name('approval');

    Route::middleware(['approved'])->group(function () {

        Route::resource('posts','PostController');
        Route::resource('contents','ContentController');
//        Route::resource('texts','TextController');
//        Route::resource('type-texts','TypeTextController');
//        Route::resource('images','ImageController');

        Route::get('types','TypeController@index')
            ->name('types');

        Route::get('colors','ColorController@index')
            ->name('colors');

        Route::get('sizes','SizeController@index')
            ->name('sizes');

        Route::get('aligns','AlignController@index')
            ->name('aligns');

        Route::get('/post/contents/{id}','ContentsEditController@edit')
            ->name('post.contents.edit')
            ->where('id','[0-9)]+');

        Route::middleware(['checkContents'])->group(function () {

            Route::get('/post/contents/create/{id}','ContentsEditController@create')
                ->name('post.contents.create')
                ->where('id','[0-9)]+');

        });

        Route::get('/post/contents/list/{id}','ContentsEditController@listById')
            ->name('post.contents.getAllByID')
            ->where('id','[0-9]+');

        Route::get('/post/contents/order/{id}','ContentsEditController@getOrder')
            ->name('post.contents.order')
            ->where('id','[0-9]+');

        Route::post('/publish','ContentController@createContents');

        Route::get('/publish/success/{post_id}','ContentController@success')
            ->name('publish.success')
            ->where('post_id','[0-9]');

        Route::get('/post/{id}','PostController@view')
            ->name('post.view')
            ->where('id','[0-9]');

        Route::get('/contentsWithProperty','ContentController@getContentsProperty')
            ->name('contents.properties')
            ->where('id','[0-9]');

        Route::get('/post/contents/properties/{id}','ContentController@getContents')
            ->name('contents')
            ->where('id','[0-9]');

        Route::post('/posts/contents/destroy','ContentController@destroyList')
            ->name('contents.destroy');

    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin-register', 'UserController@index')->name('admin.users.index');
        Route::get('/admin-register/approve/{user_id}', 'UserController@approve')->name('admin.users.approve');
        Route::get('/admin-register/dissapprove/{user_id}', 'UserController@dissApprove')->name('admin.users.dissapprove');
    });

});


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/form-contact','NotificationController@view')->name('form-contact');

Route::post('/submit','NotificationController@send')->name('submit-contact');


