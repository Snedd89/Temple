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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

// Direct route
// Route::get('/about', function () {
//     return view('pages.about');
// });

// // dynamic example
// Route::get('/users/{id}/{name}', function ($id, $name) {
//     return "This is user" . $id . ". Name is:". $name;
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
