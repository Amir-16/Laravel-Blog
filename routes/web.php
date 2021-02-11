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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','FrontEnd\FrontendController@index')->name('index');

Route::get('/contact','FrontEnd\FrontendController@contact')->name('contacts');

Route::get('/details','FrontEnd\FrontendController@Details')->name('news.details');

Route::get('/categories','FrontEnd\FrontendController@Categories')->name('news.categories');

Auth::routes();

//Backend Routes groups
Route::group(['middleware'=>'auth'],function(){

  Route::prefix('users')->group(function(){
    Route::get('/view','Backend\UserController@index')->name('users.view');
    Route::get('/add','Backend\UserController@add')->name('users.add');
    Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
    Route::post('/store','Backend\UserController@store')->name('users.store');
    Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
    Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
  });

  //profiles Route
  Route::prefix('profile')->group(function(){
    Route::get('/view','Backend\ProfileController@index')->name('profiles.view');
    Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
    Route::post('/update','Backend\ProfileController@update')->name('profiles.update');
    Route::get('/password/view','Backend\ProfileController@passwordView')->name('profiles.password.view');
    Route::post('/password/update','Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
  });
    //Category Route
    Route::prefix('category')->group(function(){

      Route::get('/view','Backend\CategoryController@index')->name('categories.view');
      Route::post('/store','Backend\CategoryController@store')->name('categories.store');
      Route::get('/edit{id}','Backend\CategoryController@edit')->name('categories.edit');
      Route::post('/update{id}','Backend\CategoryController@update')->name('categories.update');

  });



});

// Route::get('/home', 'HomeController@index')->name('home');
