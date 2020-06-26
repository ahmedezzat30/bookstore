<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function (){
    return view ("welcome");
});

Route::get('/books','BookController@index');


Route::middleware('is_admin')->group(function(){

Route::get('/books/create','BookController@create');
Route::post('/books/store','BookController@store');

Route::get('/books/edit/{id}','BookController@edit');
Route::post('/books/update/{id}','BookController@update');

Route::get('/books/delete/{id}','BookController@delete');
});


Route::get('/users/register','UserController@registerform');
Route::post('/users/register','UserController@handleregister');

Route::get('/users/login','UserController@loginform');
Route::post('/users/login','UserController@handlelogin');



Route::get('/books/{id}','BookController@show');


Route::get('/notauth',function(){
    return "you dont have per. to go this page";
});

Route::get('users/comment','UserController@note');
Route::post('users/comment','UserController@handlenote');
Route::get('users/delete/{id}','UserController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
