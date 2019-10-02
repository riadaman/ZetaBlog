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



Route::get('post', 'PostController@post_all');

//Route::get('/{anypath}', 'HomeController@index')->where('path','.*');


//category
Route::post('/add-category','CategoryController@add_category');
Route::get('/category','CategoryController@all_category');
Route::get('/category/{id}','CategoryController@delete_category');