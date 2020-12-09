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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//all frontend Routes

Route::get('/',function(){
  return view('frontend.index');
});
Route::get('/single-page',function(){
  return view('frontend.single-page');
});
Route::get('/contact',function(){
  return view('frontend.contact');
});


//Admin Routes

Route::get('/dashboard',function(){
  return view('admin.index');
});
