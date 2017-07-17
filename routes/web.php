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
/**
 * blogs
 */
Route::resource('blogs', 'BlogController');
/**
 * for comment creation
 */
Route::post('comments/{blog_id}', ['uses' => 'CommentController@store', 'as'=>'comments.store']);
/**
 * authentication
 */
Auth::routes();
/**
 * redirect after logged in
 */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * JQuery datatables 
 */
Route::get('datatables', 'BlogController@data')->name('showtable');
Route::get('datatables/blogs', 'BlogController@datatable');