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


Route::get('/contact', 'AdminPostsController@contact')->name('contact');

Route::get('/', 'AdminPostsController@show4')->name('home');
Route::get('/posts/{cat}', 'AdminPostsController@showCat')->name('category');
Route::get('/post/{name}', 'AdminPostsController@showPost')->name('post');

Route::post('/sendmsg', 'Emails@create')->name('sendEmail');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'admin'], function(){

    Route::get('admin', function(){
    return view('admin.index');
    })->name('admin');

    Route::resource('admin/users', 'AdminUsersController', ['names' => [
            'index'  => 'admin.users.index',
            'create' => 'admin.users.create',
            'store'  => 'admin.users.store',
            'edit'   => 'admin.users.edit'
    ]]);

    Route::delete('admin/delete/users', 'AdminUsersController@deleteUsers')->name('admin.delete.users');

    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [
            'index'  => 'admin.categories.index',
            'store'  => 'admin.categories.store',
            'edit'   => 'admin.categories.edit'
    ]]);

    Route::resource('admin/medias', 'AdminMediasController', ['names' => [
            'index'  => 'admin.medias.index',
            'create' => 'admin.medias.create'
    ]]);

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia')->name('admin.delete.media');

    Route::resource('admin/posts', 'AdminPostsController', ['names' => [
            'index'  => 'admin.posts.index',
            'create' => 'admin.posts.create',
            'edit'   => 'admin.posts.edit',
            'store'  => 'admin.posts.store'
    ]]);

    Route::delete('admin/delete/posts', 'AdminPostsController@deletePosts')->name('admin.delete.posts');

    Route::get('admin/emails', 'Emails@index')->name('admin.emails.index');
    Route::delete('admin/delete/emails', 'Emails@deleteEmails')->name('admin.delete.emails');

});

