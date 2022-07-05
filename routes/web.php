<?php

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

Route::get('/','ProductController@index');
Route::get('/add-product','ProductController@create');
Route::post('/add-product','ProductController@store');
Route::get('/edit-product/{product}','ProductController@edit');
Route::post('/edit-product/{product}','ProductController@update');
Route::delete('/delete-product/{product}','ProductController@delete');
Route::get('/search','ProductController@search');


Route::get('/category','CategoryController@index');
Route::get('/add-category','CategoryController@create');
Route::post('/add-category','CategoryController@store');

Route::get('/home', function () {
    return view('home');
});


