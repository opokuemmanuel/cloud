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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'AdminSignController@LoginForm')->name('logs');


/////////////////////// All routes on course content////////////////////////
Route::post('/course_content', 'CourseMaterialController@upload')->name('course');
Route::get('/course_contents', 'CourseMaterialController@add_content')->name('course_content');
Route::get('/view_course_content', 'CourseMaterialController@view_content')->name('view_course_content');
Route::get('/EditMaterial/{Course_Title}', 'CourseMaterialController@show_Edit');
Route::post('/UpdateContent', 'CourseMaterialController@update')->name('UpdateContents');
Route::post('/deleteContent', 'CourseMaterialController@delete')->name('deleteMaterial');

