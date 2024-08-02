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

/*Route::get('/',function () {
    return view('welcome');
});*/

Route::get('/','LoginController@login')->name('login');
Route::post('do-login','LoginController@doLogin')->name('do.login');

Route::group(['middleware'=>'user_auth'],function(){

    Route::get('logout','LoginController@logout')->name('logout');
    
    Route::get('users','FrondEndController@homePage')->name('home')->middleware('user_auth');
    
    Route::get('new-user','FrondEndController@create')->name('create.user');
    Route::post('save-user','FrondEndController@save')->name('save.user');
    
    Route::get('view-user/{userId}','FrondEndController@view')->name('view.user');

    Route::get('edit-user/{userId}','FrondEndController@edit')->name('edit.user');
    Route::post('update-user','FrondEndController@update')->name('update.user');
    
    Route::get('delete-user/{userId}','FrondEndController@delete')->name('delete.user');
    
    Route::get('activate-user/{userId}','FrondEndController@activate')->name('activate.user');
    Route::get('force-delete-user/{userId}','FrondEndController@forceDelete')->name('force.delete.user');
});



//GET POST PUT DELETE PATCH