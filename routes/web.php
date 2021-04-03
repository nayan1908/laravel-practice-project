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
    //return redirect()->guest('login');

});
Route::get('admin', function(){
    return view('admin_template');
});

Route::get('test', 'TestController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/store', 'UserController@store');    
    Route::get('users/view/{num}', 'UserController@show');    
    Route::get('users/edit/{num}', 'UserController@edit');
    Route::put('users/update/{num}', 'UserController@update');
    Route::delete('users/delete/{num}', 'UserController@destroy');
});
