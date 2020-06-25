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
//  Route::get('/home', function() {
//  	return view('user/home/home');
//  });
//   Route::get('test', function () {
//   	return "Ashin Indavudha";
//   });
//    Route::get('count', function() {
//    	return 12 + 10;
//    });


   // Route::get('/testhome', function() {
   // 	return "I am Test Home Page";
   // });

   // Route::get('/about', function(){
   // 	return "I am About Page";
   // });

   // Route::get('/contact', function(){
   // 	return "I am Contact Page";
   // });

  // Route::get('/testhome', function(){
  // 	return view('testhome');
  // });

  // Route::get('/post/{id}', function($id){
  // 	return "this is post test". $id;
  // });

  // Route::get('/post/{id}/{name}', function($id, $name){

  // 	return "this is post test page". $id.".". $name;
  // });

  // Route::get('/admin/post/example', array('as'=>'admin.home', function(){

  // 	$url = route('admin.home');

  // 	return "this is url" . $url;
  // }));

 //Route::get('testhome', 'UserController@index');

  //Route::get('testpost', 'TestPostController@index');

  //Route::get('testpost/create', 'TestPostController@create');
  Route::resource('testpost', 'TestPostController');
  Route::resource('userlist', 'UserController');
  
  Route::resource('categories', 'CategoryController');
  
  Route::resource('posts', 'BlogController');
  Route::resource('chapters', 'ChapterController');
  Route::resource('suttas', 'SuttaController');

  Route::resource('books', 'BookController');

  Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);
  
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

